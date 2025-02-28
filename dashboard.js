$(function(){
    $(".loader-div").show();
    $.ajax({    //Total Position not abolished
    url:"includes/functions.php",
    method:"POST",
    data:{getTotalPos:0},
    success:function(data){
        $(".loader-div").hide(); 
        const TotalPos = JSON.parse(data);
        if(TotalPos['total_positions']){
            $('#totalPositionNumber').text(TotalPos['total_positions']);
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
    $(".loader-div").show();
    $.ajax({    //Total Filled
    url:"includes/functions.php",
    method:"POST",
    data:{getFilled:0},
    success:function(data){
        $(".loader-div").hide(); 
        const FilledPos = JSON.parse(data);
        if(FilledPos['total_filled_positions']){
            $('#filledPositionNumber').text(FilledPos['total_filled_positions']);
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
    $(".loader-div").show();
    $.ajax({    //Percent Filled
    url:"includes/functions.php",
    method:"POST",
    data:{getPercentFilled:0},
    success:function(data){
        $(".loader-div").hide(); 
        const PercentFilledPos = JSON.parse(data);
        let PercentFilled = PercentFilledPos['filled_percentage'];
        if(PercentFilled){
            let roundedPercentFilled = parseFloat(PercentFilled).toFixed(2);
            $('#filledPositionPercent').text(roundedPercentFilled + '%');
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
    $(".loader-div").show();
    $.ajax({ //Total Unfilled
    url:"includes/functions.php",
    method:"POST",
    data:{getUnFilled:0},
    success:function(data){
        $(".loader-div").hide(); 
        const UnFilledPos = JSON.parse(data);
        if(UnFilledPos['total_unfilled_positions']){
            $('#unFilledPositionNumber').text(UnFilledPos['total_unfilled_positions']);
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
    $(".loader-div").show();
    $.ajax({ //Percent Unfilled
    url:"includes/functions.php",
    method:"POST",
    data:{getPercentUnFilled:0},
    success:function(data){
        $(".loader-div").hide(); 
        const PercentUnFilledPos = JSON.parse(data);
        let PercentUnFilled = PercentUnFilledPos['unfilled_percentage'];
        if(PercentUnFilled){
            let roundedPercentUnFilled = parseFloat(PercentUnFilled).toFixed(2);
            $('#unFilledPositionPercent').text(roundedPercentUnFilled + '%');
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
    $(".loader-div").show();
    $.ajax({    //Total Position that abolished
    url:"includes/functions.php",
    method:"POST",
    data:{getTotalAbolishedPos:0},
    success:function(data){
        $(".loader-div").hide(); 
        const TotalAbolishedPos = JSON.parse(data);
        if(TotalAbolishedPos['total_abolished_positions']){
            $('#abolishedPositionNumber').text(TotalAbolishedPos['total_abolished_positions']);
        }
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
    }
    });
});