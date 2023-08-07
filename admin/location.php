<!DOCTYPE html>
<html>

<head>
    <!-- link the  CSS and JS files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
</head>

<body>
    <select id="locationDropdown" multiple style="width: 300px;">
    </select>
    <script>
        // locations 
        const locationsDominicanRepublic = [
            "Santo Domingo",
            "Santiago",
            "San Pedro de Macorís",
            "La Romana",
            "San Cristóbal",
            
        ];

        // populate dropdown 
        const locationDropdown = document.getElementById('locationDropdown');

        locationsDominicanRepublic.forEach(location => {
            const option = new Option(location, location);
            locationDropdown.add(option);
        });
    </script>
    <script>
        
        // initialize Select2
        $(document).ready(function() {
            $('#locationDropdown').select2();
        });
    </script>
</body>

</html>