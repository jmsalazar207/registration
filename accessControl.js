$(function(){
    
    $(document).on('click', '#btnSetUserAccess', function () {
        var btnValue = $(this).attr('value');
        $(".loader-div").show();
    
        $.ajax({
            url: "includes/functions.php",
            method: "POST",
            data: { getUserAccess: btnValue },
            dataType: "json",
            success: function (data) {
                $(".loader-div").hide();
                generateCheckboxes(data.allAccess, data.userAccess);
                $("#userAccessModal").modal("show"); // Open modal
            },
            error: function () {
                modalErrorShow("Error retrieving data.");
                $(".loader-div").hide();
            }
        });
    });

    $(document).on('submit','#userAccessForm',function(event){
        event.preventDefault(); // Prevent the default form submission
        var PassData = '';
        modalConfirmShow('Would you like to confirm and save the user access now?',saveAccessControl,PassData); 
    });

    $(document).on('click','#btnRemoveUserAccess',function(){
        var btnValue = $(this).attr('value');
        modalConfirmShow("Would you like to proceed with removing the user's access? Only the default pages will be retained",RemoveAccessControl,btnValue); 
    });
    
function generateCheckboxes(allAccess, userAccess) {
    let checkboxHtml = `
        <div class="row">
            <div class="col-12">
                <div class="form-check mb-2 ms-4"> <!-- added ms-3 -->
                    <input type="checkbox" class="form-check-input" id="selectAllAccess">
                    <label class="form-check-label" for="selectAllAccess">Select All</label>
                </div>
            </div>
        </div>
        <div class="row">
    `;

    allAccess.forEach((access, index) => {
        let isChecked = userAccess.includes(access.page_access_code) ? "checked" : "";

        checkboxHtml += `
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="access_${access.page_access_code}" 
                           value="${access.page_access_code}" ${isChecked}>
                    <label class="flat-red" for="access_${access.page_access_code}">
                        ${access.page_access_set_name}
                    </label>
                </div>
            </div>
        `;

        if ((index + 1) % 2 === 0) {
            checkboxHtml += '</div><div class="row">';
        }
    });

    checkboxHtml += '</div>';

    $("#accessControlList").html(checkboxHtml);

    // Select All checkbox toggle
    $("#selectAllAccess").on("change", function () {
        const isChecked = $(this).is(":checked");
        $("#accessControlList input[type='checkbox']")
            .not("#selectAllAccess")
            .prop("checked", isChecked);
    });

    // Keep Select All in sync
    $("#accessControlList").on("change", "input[type='checkbox']:not(#selectAllAccess)", function () {
        const total = $("#accessControlList input[type='checkbox']").not("#selectAllAccess").length;
        const checked = $("#accessControlList input[type='checkbox']:checked").not("#selectAllAccess").length;

        $("#selectAllAccess").prop("checked", total === checked);
    });
}


    function saveAccessControl(){
        let selectedAccess = [];
        $("input[type=checkbox]:checked").each(function () {
            selectedAccess.push($(this).val());
        });
        let userID = $("#btnSetUserAccess").val(); // Get the userID from the button
        $.ajax({
            url: "accessControlSave.php", // Your PHP handler file
            type: "POST",
            data: {
                token: $("input[name=token]").val(),
                selectedAccess: selectedAccess,
                userID: userID // Send the selected checkboxes
            },
            dataType: "json",
            success: function (response) {
                modalAlertShow(response.msg); // Show success or error message
                if (response.status === "success") {
                    modalSuccessShow(response.msg,refreshPage);
                }
            },
            error: function () {
                modalErrorShow("An error occurred. Please try again.");
            }
        });
    }

    function RemoveAccessControl(RemoveID){
        $(".loader-div").show();
        $.ajax({
          url:"accessControlRemove.php",
          method:"POST",
          data:{removeUserAccess:RemoveID},
          dataType: 'json',
          success:function(data){
            $(".loader-div").hide();
            const msg = data.msg;
            const stat = data.status;  
            if(stat === "success"){ 
              modalSuccessShow(msg,refreshPage);
            } else {
             modalErrorShow(msg);
            }
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();s
          }
        });
    }
});