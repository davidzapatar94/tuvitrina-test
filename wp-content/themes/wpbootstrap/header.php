  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>
  <body>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
        <div class="nav-collapse collapse">
          <ul class="nav">

              <?php wp_list_pages(array('title_li' => '', 'exclude' => 4)); ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="container">

  <div id="menu-wrapper">

    <nav class="menu">
      <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
      <label class="menu-open-button" for="menu-open">
        <span class="hamburger hamburger-1"></span>
        <span class="hamburger hamburger-2"></span>
        <span class="hamburger hamburger-3"></span>
      </label>
      
      <a href="#" class="menu-item"> <i class="fa fa-bar-chart"></i> </a>
      <a href="#" class="menu-item"> <i class="fa fa-plus"></i> </a>
      <a href="#" class="menu-item"> <i class="fa fa-heart"></i> </a>
      <a href="#" class="menu-item"> <i class="fa fa-envelope"></i> </a>
      
      
    </nav>


    <!-- filters -->
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>

          <filter id="shadowed-goo">
              
              <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
              <feColorMatrix in="blur" mode="matrix" 
                                        values="1 0 0 0 0  
                                                0 1 0 0 0  
                                                0 0 1 0 0  
                                                0 0 0 18 -7" 
                                        result="goo" />

              <feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
              <feColorMatrix in="shadow" mode="matrix" 
                                        values="0 0 0 0 0  
                                                0 0 0 0 0  
                                                0 0 0 0 0  
                                                0 0 0 1 -0.2" 
                                        result="shadow" />
              <feOffset in="shadow" dx="1" dy="1" result="shadow" />

              <feComposite in2="shadow" in="goo" result="goo" />
              <feComposite in2="goo" in="SourceGraphic" result="mix" />
          </filter>

          <filter id="goo">
              <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
              <feColorMatrix in="blur" mode="matrix" 
                                        values="1 0 0 0 0  
                                                0 1 0 0 0  
                                                0 0 1 0 0  
                                                0 0 0 18 -7" 
                                        result="goo" />
              <feComposite in2="goo" in="SourceGraphic" result="mix" />
          </filter>

        </defs>
    </svg>
  </div>

