<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="EmpireDev">

    <title><?= $title_for_layout ?> - <?= $website_name ?></title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('prettyPhoto.css') ?>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('responsive.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>

      <?= $this->Html->script('jquery-1.11.0.js') ?>

    <link href='//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />

</head>
<body>

    <header>
      <?= $this->element('navbar') ?>
    </header>
    <?php if($this->request->params['controller'] != "pages"): ?>
    <div id="heading-breadcrumbs" style="background-color: #444141">
      <div class="container">
        <div class="row">
            <div class="section-header">
              <?php if($this->request->params['controller'] != "pages"): ?>
                <center><h2 class="title-one" style="color:white;">Mon compte</h2></center>
              <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?= $this->fetch('content'); ?>
    <footer id="footer">
      <div class="container">
        <div class="text-center">
          <p>&copy; 2017 Réalisé par EmpireDev</p>
          <p class="text-left"><?= $Lang->get('GLOBAL__FOOTER') ?></p>
        </div>
      </div>
    </footer>


  <?= $this->element('modals') ?>

  <?= $this->Html->script('bootstrap.js') ?>
  <?= $this->Html->script('app.js') ?>
  <?= $this->Html->script('form.js') ?>
  <?= $this->Html->script('notification.js') ?>
  <script>
  <?php if($isConnected) { ?>
    // Notifications
    var notification = new $.Notification({
      'notification_type': 'user',
      'limit': 5,
      'url': {
        'get': '<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
        'clear': '<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
        'clearAll': '<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
        'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
        'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
      },
      'messages': {
        'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
        'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
      },
      'indicator': {
        'element': '#notification-indicator',
        'class': 'label label-warning',
        'style': {},
        'defaultContent': '<i class="fa fa-bell-o"></i>'
      },
      'list': {
        'element': '#notification-container',
        'container': {
          'type': '',
          'class': '',
          'style': ''
        },
        'notification': {
          'type': 'li',
          'class': '',
          'style': 'list-style-type: none;border-bottom: solid 1px #eeeeee;text-transform: uppercase;letter-spacing: 0.08em;padding: 4px 0;',
          'content':'<a href="#" style="color: #999999;font-size: 12px;">{CONTENT}</a>',
          'from': {
            'type': '',
            'class': '',
            'style': '',
            'content': ''
          },
          'seen': {
            'element': {
              'style': '',
              'class': ''
            },
            'btn': {
              'element': '.mark-as-seen',
              'style': '',
              'class': 'hidden',
              'attr': [{'onclick': ''}],
            }
          }
        }
      }
    });
  <?php } ?>
  // Config FORM/APP.JS

  var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
  var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

  var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
  var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
  var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
  var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
  var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

  var CSRF_TOKEN = "<?= $csrfToken ?>";
  </script>

  <?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?= $google_analytics ?>', 'auto');
      ga('send', 'pageview');
    </script>
  <?php } ?>
  <?= $configuration_end_code ?>

</body>

</html>
