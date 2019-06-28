// Load Charts and the corechart package.
google.charts.load('current', {'packages':['corechart', 'bar', 'calendar']});

// Draw the pie chart for Sarah's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawSarahChart);

// Draw the pie chart for the Anthony's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawAnthonyChart);

google.charts.setOnLoadCallback(drawDonutChart);

google.charts.setOnLoadCallback(drawAxisTickColors);

google.charts.setOnLoadCallback(drawBackgroundColor);

google.charts.setOnLoadCallback(drawCalendarChart);

// Callback that draws the pie chart for Sarah's pizza.
function drawSarahChart() {

    // Create the data table for Sarah's pizza.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Mushrooms', 1],
        ['Onions', 1],
        ['Olives', 2],
        ['Zucchini', 2],
        ['Pepperoni', 1]
    ]);

    // Set options for Sarah's pie chart.
    var options = {title:'Mayor población',
        width:400,
        height:300};

    // Instantiate and draw the chart for Sarah's pizza.
    var chart = new google.visualization.ColumnChart(document.getElementById('Sarah_chart_div'));
    chart.draw(data, options);
}

// Callback that draws the pie chart for Anthony's pizza.
function drawAnthonyChart() {

    // Create the data table for Anthony's pizza.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Mushrooms', 2],
        ['Onions', 2],
        ['Olives', 2],
        ['Zucchini', 0],
        ['Pepperoni', 3]
    ]);

    // Set options for Anthony's pie chart.
    var options = {title:'Niveles de estudio',
        width:400,
        height:300};

    // Instantiate and draw the chart for Anthony's pizza.
    var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
    chart.draw(data, options);
}

function drawDonutChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
    ]);

    var options = {
        title: 'My Daily Activities',
        pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}


function drawAxisTickColors() {
    // Create the data table for Sarah's pizza.
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'style' }],
        ['Copper', 8.94, '#b87333'],            // RGB value
        ['Silver', 10.49, 'silver'],            // English color name
        ['Gold', 19.30, 'gold'],

        ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
    ]);

    // Set options for Sarah's pie chart.
    var options = {title:'Mayor población',
        width:400,
        height:300};

    // Instantiate and draw the chart for Sarah's pizza.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawBackgroundColor() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Dogs');

    data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
    ]);

    var options = {
        hAxis: {
            title: 'Time'
        },
        vAxis: {
            title: 'Popularity'
        },
        backgroundColor: '#f1f8e9'
    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
    chart.draw(data, options);
}

function drawCalendarChart() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'date', id: 'Date' });
    dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
    dataTable.addRows([
        [ new Date(2019, 3, 13), 37032 ],
        [ new Date(2019, 3, 14), 38024 ],
        [ new Date(2019, 3, 15), 38024 ],
        [ new Date(2019, 3, 16), 38108 ],
        [ new Date(2019, 3, 17), 38229 ],
        // Many rows omitted for brevity.

    ]);

    var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

    var options = {
        title: "Historico",
        height: 200,
    };

    chart.draw(dataTable, options);
}