<!DOCTYPE html>
<html>

<head>
    <!-- Add the necessary CSS and JS files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
</head>

<body>
    <select id="locationDropdown" multiple style="width: 300px;">
    </select>
    <script>
        // Sample data of locations in the Dominican Republic
        const locationsDominicanRepublic = [
            "Santo Domingo",
            "Santiago",
            "San Pedro de Macorís",
            "La Romana",
            "San Cristóbal",
            // Add more locations as needed
        ];

        // Populate the dropdown with options
        const locationDropdown = document.getElementById('locationDropdown');

        locationsDominicanRepublic.forEach(location => {
            const option = new Option(location, location);
            locationDropdown.add(option);
        });
    </script>
    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('#locationDropdown').select2();
        });
    </script>
</body>

</html>