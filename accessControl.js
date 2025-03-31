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
        let checkboxHtml = '<div class="row">';
    
        allAccess.forEach((access, index) => {
            let isChecked = userAccess.includes(access.page_access_code) ? "checked" : "";
    
            checkboxHtml += `
                <div class="col-md-6"> <!-- Adjust column width -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="access_${access.page_access_code}" 
                               value="${access.page_access_code}" ${isChecked}>
                        <label class="flat-red" for="access_${access.page_access_code}">
                            ${access.page_access_set_name}
                        </label>
                    </div>
                </div>
            `;
    
            // Start a new row after every 4 checkboxes
            if ((index + 1) % 2 === 0) {
                checkboxHtml += '</div><div class="row">';
            }
        });
    
        checkboxHtml += '</div>'; // Close the last row
        $("#accessControlList").html(checkboxHtml);
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