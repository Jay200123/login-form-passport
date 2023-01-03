$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/chart/city-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("cityChart"), {

              //js chart code bugs  
            // var ctx = document.getElementById("cityChart");
            // var ctx = $("#cityChart");
            // var myBarChart = new Chart(ctx, {
                
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Numbers of Active Customers in Diffrent City',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },
                  
            // });

                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    // product chart
    $.ajax({
        type: "GET",
        url: "/api/chart/brand-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("brandChart"), {
                
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Number of Brands that the Shop has',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },
                  
            // });

                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/chart/town-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("townChart"), {
                
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Number of Active Employees in Diffrent Town',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },

                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });


       });