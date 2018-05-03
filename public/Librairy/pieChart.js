jQuery(document).ready(function(){
    console.log("ok chargement");
    if (screen.width >=700) {

    var pie = new d3pie("pieChartvente", {
        "header": {
    		"title": {
    			"text": "Commerce",
    			"color": "#fbfbfb",
    			"fontSize": 34,
    			"font": "courier"
    		},
    		"subtitle": {
    			"color": "#999999",
    			"fontSize": 10,
    			"font": "courier"
    		},
    		"location": "pie-center",
    		"titleSubtitlePadding": 10
    	},
    	// "footer": {
    	// 	"color": "#999999",
    	// 	"fontSize": 10,
    	// 	"font": "open sans",
    	// 	"location": "bottom-left"
    	// },
    	"size": {
    		"canvasWidth": 590,
            "pieInnerRadius": "88%",
    		"pieOuterRadius": "48%"
    	},
    	"data": {
    		"sortOrder": "value-asc",
    		"content": [
    			{
    				"label": "Commerce vente",
    				"value": 50,
    				"color": "#2f52aa"
    			},
    			{
    				"label": "Management",
    				"value": 30,
    				"color": "#2f3399"
    			},
    			{
    				"label": "Gestion d'un site",
    				"value": 10,
    				"color": "#00047c"
    			}
    		]
    	},
    	"labels": {
    		"outer": {
    			"format": "label-percentage1",
    			"pieDistance": 20
    		},
    		"inner": {
    			"format": "none"
    		},
    		"mainLabel": {
    			"color": "#fbfbfb",
    			"fontSize": 11
    		},
    		"percentage": {
    			"color": "#fbfbfb",
    			"fontSize": 11,
    			"decimalPlaces": 0
    		},
    		"value": {
    			"color": "#fbfbfb",
    			"fontSize": 11
    		},
    		"lines": {
    			"enabled": true,
    			"style": "straight",
    			"color": "#fbfbfb"
    		},
    		"truncation": {
    			"enabled": true
    		}
    	},
    	"effects": {
    		"pullOutSegmentOnClick": {
    			"effect": "linear",
    			"speed": 400,
    			"size": 8
    		}
    	},
    	"misc": {
    		"colors": {
    			"segmentStroke": "#000000"
    		}
    	},
    	"callbacks": {
    		"onMouseoverSegment": null,
    		"onMouseoutSegment": null,
    		"onClickSegment": null
    	}
    });

    var pie = new d3pie("pieChartinfo", {
    	"header": {
    		"title": {
    			"text": "Informatique",
    			"color": "#fbfbfb",
    			"fontSize": 25,
    			"font": "courier"
    		},
    		"subtitle": {
    			"color": "#999999",
    			"fontSize": 10,
    			"font": "courier"
    		},
    		"location": "pie-center",
    		"titleSubtitlePadding": 10
    	},
    	// "footer": {
    	// 	"color": "#999999",
    	// 	"fontSize": 10,
    	// 	"font": "open sans",
    	// 	"location": "bottom-left"
    	// },
    	"size": {
    		"canvasWidth": 590,
    		"pieInnerRadius": "88%",
    		"pieOuterRadius": "48%"
    	},
    	"data": {
    		"sortOrder": "value-asc",
    		"content": [
    			{
    				"label": "HTML/CSS",
    				"value": 35,
    				"color": "#03195d"
    			},
    			{
    				"label": "PHP",
    				"value": 20,
    				"color": "#021245"
    			},
    			{
    				"label": "SQL",
    				"value": 20,
    				"color": "#021e74"
    			},
    			{
    				"label": "JAVAScript",
    				"value": 15,
    				"color": "#052380"
    			},
    			{
    				"label": "Symfony 4",
    				"value": 10,
    				"color": "#000924"
    			},
    			{
    				"label": "Jquery",
    				"value": 10,
    				"color": "#000b2f"
    			}
    		]
    	},
    	"labels": {
    		"outer": {
    			"format": "label-percentage1",
    			"pieDistance": 20
    		},
    		"inner": {
    			"format": "none"
    		},
    		"mainLabel": {
    			"color": "#fbfbfb",
    			"fontSize": 11
    		},
    		"percentage": {
    			"color": "#fbfbfb",
    			"fontSize": 11,
    			"decimalPlaces": 0
    		},
    		"value": {
    			"color": "#fbfbfb",
    			"fontSize": 11
    		},
    		"lines": {
    			"enabled": true,
    			"style": "straight",
    			"color": "#fbfbfb"
    		},
    		"truncation": {
    			"enabled": true
    		}
    	},
    	"effects": {
    		"pullOutSegmentOnClick": {
    			"effect": "linear",
    			"speed": 400,
    			"size": 8
    		}
    	},
    	"misc": {
    		"colors": {
    			"segmentStroke": "#000000"
    		}
    	},
    	"callbacks": {
    		"onMouseoverSegment": null,
    		"onMouseoutSegment": null,
    		"onClickSegment": null
    	}

    });
}
    if (screen.width <= 700) {
        //fonction permettant d'afficher les skills bar en responsive

                console.log("envoie le script skill bar");
        	    jQuery('.skillbar').each(function(){
        		jQuery(this).find('.skillbar-bar').animate({
        		width:jQuery(this).attr('data-percent')
        		},6000);
        	   });


    }
});
