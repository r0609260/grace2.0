AmCharts.makeChart("chartdiv",
        {
            "type": "serial",
            "categoryField": "date",
            "dataDateFormat": "YYYY-MM",
            "autoMarginOffset": 0,
            "marginBottom": 0,
            "marginLeft": 0,
            "marginTop": 0,
            "marginRight": 20,
            "plotAreaBorderColor": "#2C3D51",
            "plotAreaFillColors": "#F5F5F5",
            "zoomOutButtonColor": "#A5A5A5",
            "backgroundColor": "#F5F5F5",
            "borderColor": "#2C3D51",
            "color": "#2C3D51",
            "fontFamily": "Lato",
            "fontSize": 20,
            "theme": "default",
            "categoryAxis": {
                "minPeriod": "MM",
                "parseDates": true,
                "titleBold": false
            },
            "chartScrollbar": {
                "enabled": true,
                "backgroundColor": "#2C3D51",
                "dragIconHeight": 30,
                "dragIconWidth": 30
            },
            "trendLines": [],
            "graphs": [
                {
                    "bullet": "round",
                    "fillColors": "undefined",
                    "id": "AmGraph-1",
                    "lineColor": "#2C3D51",
                    "title": "graph 1",
                    "valueField": "column-1"
                },
                {
                    "bullet": "round",
                    "id": "AmGraph-2",
                    "lineColor": "#2C3D51",
                    "title": "graph 2",
                    "valueField": "column-2"
                }
            ],
            "guides": [],
            "valueAxes": [
                {
                    "id": "ValueAxis-1",
                    "maximum": 4,
                    "minimum": 0,
                    "precision": 0,
                    "axisColor": "#2C3D51",
                    "title": "Score (0-4)",
                    "titleBold": false
                }
            ],
            "allLabels": [],
            "balloon": {},
            "titles": [
                {
                    "id": "Title-1",
                    "size": 30,
                    "text": ""
                }
            ],
            "dataProvider": [
                {
                    "date": "2014-01",
                    "column-1": "2",
                    "column-2": "2"
                },
                {
                    "date": "2014-02",
                    "column-1": "3",
                    "column-2": "1"
                },
                {
                    "date": "2014-03",
                    "column-1": 2,
                    "column-2": 3
                },
                {
                    "date": "2014-04",
                    "column-1": 1,
                    "column-2": 3
                },
                {
                    "date": "2014-05",
                    "column-1": 2,
                    "column-2": 1
                },
                {
                    "date": "2014-06",
                    "column-1": 3,
                    "column-2": 2
                },
                {
                    "date": "2014-07",
                    "column-1": "4",
                    "column-2": "2"
                }
            ]
        }
);