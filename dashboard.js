$(function(){
    $('.sidebar-menu').tree();

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

    // Ensure separate chart instances
    if (typeof window.myDivisionChart !== 'undefined') {
        window.myDivisionChart.destroy();
    }
    
    if (typeof window.myClassificationChart !== 'undefined') {
        window.myClassificationChart.destroy();
    }

    $.ajax({    //bar chart for filled unfilled per division
        url: "getPositionPerDiv.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.error) {
                console.error(response.error);
                return;
            }

            var ctx = $("#DivisionBarChart").get(0).getContext("2d");

            var chartData = {
                labels: response.labels,
                datasets: [
                    {
                        label: "Filled Positions",
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        data: response.datasets[0].data.map(value => value > 0 ? value : null),
                        minBarLength: response.datasets[0].data.map(value => value > 0 ? 20 : 0)
                    },
                    {
                        label: "Unfilled Positions",
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        data: response.datasets[1].data.map(value => value > 0 ? value : null),
                        minBarLength: response.datasets[1].data.map(value => value > 0 ? 20 : 0)
                    }
                ]
            };

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y',
                barPercentage: 0.8,  // Controls the thickness of bars
                categoryPercentage: 0.8,  // Ensures bars do not shrink too much
                scales: { 
                    x: { stacked: true, beginAtZero: true },
                    y: { stacked: true }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Position Status per Division'
                    },
                    datalabels: {
                        color: 'black', 
                        font: { weight: 'bold', size: 12 },
                        formatter: function(value) {
                            return value > 0 ? value : '';  // Always display 0 properly
                        }
                    }
                }
            };
            

            var totalLabelPlugin = {
                id: 'totalLabels',
                afterDatasetsDraw(chart) {
                    const ctx = chart.ctx;
                    ctx.save();
                    ctx.font = "bold 14px Arial";
                    ctx.fillStyle = "black";
                    ctx.textAlign = "center"; // Center text vertically
            
                    chart.data.labels.forEach((label, index) => {
                        let total = response.total_positions[index]; // Get total positions for each category
            
                        // Find the rightmost bar (highest X position) for the current category
                        let maxX = -Infinity;
                        chart.data.datasets.forEach((dataset, datasetIndex) => {
                            let barElement = chart.getDatasetMeta(datasetIndex).data[index];
                            if (barElement && barElement.x > maxX) {
                                maxX = barElement.x; // Get the furthest bar's X position
                            }
                        });
            
                        if (maxX !== -Infinity) {
                            let yPos = chart.getDatasetMeta(0).data[index].y; // Center Y position of bars
                            let xPos = maxX + 20; // Position slightly to the right
            
                            ctx.fillText(total, xPos, yPos); // Draw total position label
                        }
                    });
            
                    ctx.restore();
                }
            };
            
            

            if (window.myDivChart) {
                window.myDivChart.destroy();
            }

            Chart.register(ChartDataLabels);

            window.myDivChart = new Chart(ctx, {
                type: "bar",
                data: chartData,
                options: chartOptions,
                plugins: [ChartDataLabels, totalLabelPlugin] 
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
        }
    });

    $.ajax({    //bar chart for filled unfilled per position classification
        url: "getPositionPerClassification.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.error) {
                console.error(response.error);
                return;
            }

            var ctx = $("#ClassificationBarChart").get(0).getContext("2d");

            var chartData = {
                labels: response.labels,
                datasets: [
                    {
                        label: "Filled Positions",
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        data: response.datasets[0].data.map(value => value > 0 ? value : null),
                        minBarLength: response.datasets[0].data.map(value => value > 0 ? 20 : null)
                    },
                    {
                        label: "Unfilled Positions",
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        data: response.datasets[1].data.map(value => value > 0 ? value : null),
                        minBarLength: response.datasets[1].data.map(value => value > 0 ? 20 : null)
                    }
                ]
            };

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'x',
                barPercentage: 0.8,  // Controls the thickness of bars
                categoryPercentage: 0.8,  // Ensures bars do not shrink too much
                scales: { 
                    x: { stacked: true, beginAtZero: true },
                    y: { stacked: true }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Position Status per Classification'
                    },
                    datalabels: {
                        color: 'black', 
                        font: { weight: 'bold', size: 12 },
                        formatter: function(value) {
                            return value > 0 ? value : '';  // Always display 0 properly
                        }
                    }
                }
            };
            

            var totalLabelPlugin = {
                id: 'totalLabels',
                afterDatasetsDraw(chart) {
                    const ctx = chart.ctx;
                    ctx.save();
                    ctx.font = "bold 14px Arial";
                    ctx.fillStyle = "black";
                    ctx.textAlign = "center"; // Center text horizontally
            
                    chart.data.labels.forEach((label, index) => {
                        let total = response.total_positions[index]; // Get total positions for each category
            
                        // Find the highest bar for the current category
                        let maxY = Infinity;
                        chart.data.datasets.forEach((dataset, datasetIndex) => {
                            let barElement = chart.getDatasetMeta(datasetIndex).data[index];
                            if (barElement && barElement.y < maxY) {
                                maxY = barElement.y; // Get the highest bar's Y position
                            }
                        });
            
                        if (maxY !== Infinity) {
                            let xPos = chart.getDatasetMeta(0).data[index].x; // Center of the bar group
                            let yPos = maxY - 10; // Place text slightly above the highest bar
            
                            ctx.fillText(total, xPos, yPos); // Draw total position label
                        }
                    });
            
                    ctx.restore();
                }
            };
            
            

            if (window.myClassChart) {
                window.myClassChart.destroy();
            }

            Chart.register(ChartDataLabels);

            window.myClassChart = new Chart(ctx, {
                type: "bar",
                data: chartData,
                options: chartOptions,
                plugins: [ChartDataLabels, totalLabelPlugin] 
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
        }
    });
});