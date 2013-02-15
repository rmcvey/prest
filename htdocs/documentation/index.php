<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SomeSite API Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/documentation/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="/documentation/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SomeSite.com API Documentation</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
			<h1>Documentation</h1>
			<p>
				All requests <strong>MUST</strong> include your assigned API key
			</p>
         	<h3>Endpoints</h3><hr />
			<h3>Question</h3>
			<h4>Methods</h4>
			<p>The question endpoint has four methods:
				<ul>
					<li>Answer - /question/answer/</li>
					<li>Edit - /question/edit/</li>
					<li>Search - /question/search/</li>
					<li>Detail - /question/detail/</li>
				</ul>
			</p>
			<h4><i class="icon-th-large"></i> Answer: /question/answer/</h4><hr />
			<h5>Params</h5>
			<div class="well">
				<strong>Required</strong>
				<ul>
					<li>q &lt;string&gt; - question title</li>
					<li>answer &lt;string&gt; - answer</li>
					
				</ul>
				<strong>Optional</strong>
				<ul>
					<li>start &lt;int&gt; - offset (default=0)</li>
					<li>count &lt;int&gt; - maximum number of results to return (default=10)</li>
				</ul>
			</div>
			<h5>Usage</h5>
			<pre class="prettyprint linenums">http://api.mysite.com/question/search/?q=Nabisco Shredded Wheat&amp;key=EXAMPLE_KEY
http://api.somesite.com/question/search/?q=Nabisco Shredded Wheat&amp;page=2&amp;limit=10&amp;key=EXAMPLE_KEY</pre>
			<h4><i class="icon-th-large"></i> Edit: /question/edit/</h4><hr />
			<h5>Params</h5>
			<div class="well">
				<strong>Required</strong>
				<ul>
					<li>q &lt;string&gt; - search term</li>
				</ul>
				<strong>Optional</strong>
				<ul>
					<li>start &lt;int&gt; - offset (default=0)</li>
					<li>count &lt;int&gt; - maximum number of results to return (default=10)</li>
				</ul>
			</div>
			<h5>Usage</h5>
			<pre class="prettyprint linenums">http://api.somesite.com/question/search/?q=Nabisco Shredded Wheat&amp;key=EXAMPLE_KEY
http://api.somesite.com/question/search/?q=Nabisco Shredded Wheat&amp;page=2&amp;limit=10&amp;key=EXAMPLE_KEY</pre>
			<h4><i class="icon-th-large"></i> Search: /question/search/</h4><hr />
			<h5>Params</h5>
			<div class="well">
				<strong>Required</strong>
				<ul>
					<li>q &lt;string&gt; - search term</li>
				</ul>
				<strong>Optional</strong>
				<ul>
					<li>start &lt;int&gt; - offset (default=0)</li>
					<li>count &lt;int&gt; - maximum number of results to return (default=10)</li>
				</ul>
			</div>
			<h5>Usage</h5>
			<pre class="prettyprint linenums">http://api.somesite.com/question/search/?q=Nabisco Shredded Wheat&amp;key=EXAMPLE_KEY
http://api.somesite.com/question/search/?q=Nabisco Shredded Wheat&amp;page=2&amp;limit=10&amp;key=EXAMPLE_KEY</pre>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; SomeCompany.com <?=date('Y')?></p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/documentation/js/bootstrap.js"></script>
	<script src="/documentation/js/pretty-print.js"></script>
	<script>
	window.prettyPrint && prettyPrint()
	</script>
  </body>
</html>
