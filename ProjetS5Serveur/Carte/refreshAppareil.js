//Rafraichir le tableau de donnée bateau toute les 5 s

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
              var $container = $("#Bateau");
              $container.load("donneeBateau.php");
              var refreshId = setInterval(function()
              {
                  $container.load('donneeBateau.php');
              }, 5000);
          });
      })(jQuery);
  

   // Rafraichir le tableau de donnée bouée toute les 5 s

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
              var $container = $("#Bouee");
              $container.load("donneeBouee.php");
              var refreshId = setInterval(function()
              {
                  $container.load('donneeBouee.php');
              }, 5000);
          });
      })(jQuery);
   

   


