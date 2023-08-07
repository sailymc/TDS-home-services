<!-- FOOTER -->

<footer class="container" style="background-color: #0000; padding: 20px;">
  <div style="text-align: center;">
    <img src="uploads/logo.png" alt="Logo" style="max-width: 500px; height: 500;">
  </div>
  <div style="text-align: center; margin-top: 10px; text-color: white">
    <p>Contacto:</p>
    <p>E-Mail: saily.cabrera@gmail.com</p>
    <p>Teléfono: +1 829-784-4622</p>
    <p>Dirección: San Pedro de Macorís</p>
    <p>&copy; 2020-2023 Saily Cabrera, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Todos los derechos reservados.</a></p>
  </div>
</footer>
</main>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="assets/js/jquery-slim.min.js"><\/script>')
</script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- placeholder for images  -->
<script src="assets/js/holder.min.js"></script>
<script src="assets/js/custom.js"></script>

<script>
    var $j = jQuery.noConflict();
    var locations = <?php echo json_encode($locations); ?>;

    // perform live search 
    function performSearch() {
      var searchQuery = $j('#search-input').val().trim().toLowerCase();

      var resultsContainer = $j('#search-results');
      resultsContainer.empty();

      if (searchQuery.length === 0) {
        resultsContainer.hide();
        return;
      }

      var filteredResults = locations.filter(function(location) {
        return location.toLowerCase().includes(searchQuery);
      });

      if (filteredResults.length > 0) {
        var resultList = $j('<ul class="list-group"></ul>');

        var maxResults = Math.min(filteredResults.length, 5);

        for (var i = 0; i < maxResults; i++) {
          resultList.append('<li class="list-group-item">' + filteredResults[i] + '</li>');
        }

        resultList.on('click', 'li', function() {
          $j('#search-input').val($j(this).text());
          resultsContainer.hide();
          resultsContainer.empty();

          // perform the search on click
          $j('#search-form').submit();
        });

        resultsContainer.append(resultList);
        resultsContainer.show(); // show the search results container
      } else {
        resultsContainer.hide(); // hide the search results container if no results
      }
    }

    // trigger the search on input change
    $j('#search-input').on('keyup', function() {
      performSearch();
    });
  </script>
</body>

</html>