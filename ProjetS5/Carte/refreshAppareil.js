//Rafraichir le tableau de donnée bateau
<script>
      (function($)
      {
          $(document).ready(function()
          {
              $.ajaxSetup(
              {
                  cache: false,
                  beforeSend: function() {
                      $('#content').hide();
                      $('#loading').show();
                  },
                  complete: function() {
                      $('#loading').hide();
                      $('#content').show();
                  },
                  success: function() {
                      $('#loading').hide();
                      $('#content').show();
                  }
              });
              var $container = $("#testAjax");
              $container.load("donneeBateau.php");
              var refreshId = setInterval(function()
              {
                  $container.load('donneeBateau.php');
              }, 10000);
          });
      })(jQuery);
   </script>

   // Rafraichir le tableau de donnée bouée
/*<script>
      (function($)
      {
          $(document).ready(function()
          {
              $.ajaxSetup(
              {
                  cache: false,
                  beforeSend: function() {
                      $('#content').hide();
                      $('#loading').show();
                  },
                  complete: function() {
                      $('#loading').hide();
                      $('#content').show();
                  },
                  success: function() {
                      $('#loading').hide();
                      $('#content').show();
                  }
              });
              var $container = $("#testAjax");
              $container.load("donneeBateau.php");
              var refreshId = setInterval(function()
              {
                  $container.load('donneeBouee.php');
              }, 10000);
          });
      })(jQuery);
   </script>*/

