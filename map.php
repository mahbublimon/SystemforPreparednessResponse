<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <script>
        L_NO_TOUCH = false;
        L_DISABLE_3D = false;
    </script>

    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/python-visualization/folium/folium/templates/leaflet.awesome.rotate.min.css" />

    <meta name="viewport" content="width=device-width,
                initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
        #map_a3cedddfa977601e108b024df0be9e36 {
            position: relative;
            width: 100.0%;
            height: 100.0%;
            left: 0.0%;
            top: 0.0%;
        }

        .leaflet-container {
            font-size: 1rem;
        }
    </style>


    <style>
        .foliumtooltip {}

        .foliumtooltip table {
            margin: auto;
        }

        .foliumtooltip tr {
            text-align: left;
        }

        .foliumtooltip th {
            padding: 2px;
            padding-right: 8px;
        }
    </style>

</head>

<body>


    <div class="folium-map" id="map_a3cedddfa977601e108b024df0be9e36"></div>

</body>
<script>


    var map_a3cedddfa977601e108b024df0be9e36 = L.map(
        "map_a3cedddfa977601e108b024df0be9e36",
        {
            center: [23.685, 90.3563],
            crs: L.CRS.EPSG3857,
            zoom: 4,
            zoomControl: true,
            preferCanvas: false,
        }
    );

    var tile_layer_1e3e99acc0bcf15fd94d13763125c88d = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        { "attribution": "Data by \u0026copy; \u003ca target=\"_blank\" href=\"http://openstreetmap.org\"\u003eOpenStreetMap\u003c/a\u003e, under \u003ca target=\"_blank\" href=\"http://www.openstreetmap.org/copyright\"\u003eODbL\u003c/a\u003e.", "detectRetina": false, "maxNativeZoom": 18, "maxZoom": 18, "minZoom": 0, "noWrap": false, "opacity": 1, "subdomains": "abc", "tms": false }
    ).addTo(map_a3cedddfa977601e108b024df0be9e36);


    function geo_json_9c241d2f3421781038b74413416ddb17_styler(feature) {
        switch (feature.id) {
            case "0": case "10": case "20": case "30": case "40":case "50":case "60":case "70":case "80":case "90":case "100":case "110":case "120":case "130":case "140":case "150":case "160":case "170":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "red", "weight": 1 };
            case "2": case "12": case "22": case "32": case "42":case "52":case "62":case "72":case "82":case "92":case "102":case "112":case "122":case "132":case "142":case "152":case "162":case "172":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "green", "weight": 1 };
            case "4": case "14": case "24": case "34": case "44":case "54":case "64":case "74":case "84":case "94":case "104":case "114":case "124":case "134":case "144":case "154":case "164":case "174":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "purple", "weight": 1 };
            case "6": case "16": case "26": case "36": case "46":case "56":case "66":case "76":case "86":case "96":case "106":case "116":case "126":case "136":case "146":case "156":case "166":case "176":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "orange", "weight": 1 };
            case "8": case "18": case "28": case "38": case "48":case "58":case "68":case "78":case "88":case "98":case "108":case "118":case "128":case "138":case "148":case "158":case "168":case "178":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "darkred", "weight": 1 };
            case "1": case "11": case "21": case "31": case "41":case "51":case "61":case "71":case "81":case "91":case "101":case "111":case "121":case "131":case "141":case "151":case "161":case "171":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "yellow", "weight": 1 };
            case "3": case "13": case "23": case "33": case "43":case "53":case "63":case "73":case "83":case "93":case "103":case "113":case "123":case "133":case "143":case "153":case "163":case "173":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "violet", "weight": 1 };
            case "5": case "15": case "25": case "35": case "45":case "55":case "65":case "75":case "85":case "95":case "105":case "115":case "125":case "135":case "145":case "155":case "165":case "175":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "pink", "weight": 1 };
            case "7": case "17": case "27": case "37": case "47":case "57":case "67":case "77":case "87":case "97":case "107":case "117":case "127":case "137":case "147":case "157":case "167":case "177":
                return { "color": "black", "dashArray": "5, 5", "fillColor": "blue", "weight": 1 };
            case "9": case "19": case "29": case "39": case "49":case "59":case "69":case "79":case "89":case "99":case "109":case "119":case "129":case "139":case "149":case "159":case "169":case "179": 
                return { "color": "black", "dashArray": "5, 5", "fillColor": "brown", "weight": 1 };
            default:
                return { "color": "black", "dashArray": "5, 5", "fillColor": "blue", "weight": 1 };
        }
    }

    function geo_json_9c241d2f3421781038b74413416ddb17_onEachFeature(feature, layer) {
        layer.on({
        });
    };
    var geo_json_9c241d2f3421781038b74413416ddb17 = L.geoJson(null, {
        onEachFeature: geo_json_9c241d2f3421781038b74413416ddb17_onEachFeature,

        style: geo_json_9c241d2f3421781038b74413416ddb17_styler,
    });

    function geo_json_9c241d2f3421781038b74413416ddb17_add(data) {
        geo_json_9c241d2f3421781038b74413416ddb17
            .addData(data)
            .addTo(map_a3cedddfa977601e108b024df0be9e36);
    }
    fetch('countries.geo.json')  
    .then(response => response.json())
    .then(data => {
        geo_json_9c241d2f3421781038b74413416ddb17_add(data);
    })
    .catch(error => {
        console.error('Error fetching GeoJSON file:', error);
    });    

    geo_json_9c241d2f3421781038b74413416ddb17.bindTooltip(
        function (layer) {
            let div = L.DomUtil.create('div');

            let handleObject = feature => typeof (feature) == 'object' ? JSON.stringify(feature) : feature;
            let fields = ["NAME", "Predicted"];
            let aliases = ["State:", "Predicted Incident Type:"];
            let table = '<table>' +
                String(
                    fields.map(
                        (v, i) =>
                            `<tr>
            <th>${aliases[i].toLocaleString()}</th>
            
            <td>${handleObject(layer.feature.properties[v]).toLocaleString()}</td>
        </tr>`).join(''))
                + '</table>';
            div.innerHTML = table;

            return div
        }
        , { "className": "foliumtooltip", "sticky": true });

</script>

</html>    