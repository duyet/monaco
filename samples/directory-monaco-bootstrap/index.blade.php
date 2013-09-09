<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/sample2/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/style/sample2/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/style/sample2/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://use.edgefonts.net/source-sans-pro.js"></script>

</head>

<body>

    <div class="container">
        <div class="row-fluid">
            <div id="content" class="span12>"></div>
        </div>
    </div>

    <script src="/js/sample2/lib/jquery-1.9.1.min.js"></script>
    <script src="/js/sample2/lib/underscore-min.js"></script>
    <script src="/js/sample2/lib/backbone-min.js"></script>
    <script src="/js/sample2/lib/monaco.js"></script>
    <script src="/js/sample2/bootstrap/js/bootstrap.js"></script>

    <script src="/js/sample2/application/app.js"></script>
    <script src="/js/sample2/application/utils/utilities.js"></script>
    <script src="/js/sample2/application/directory/routes.js"></script>
    <script src="/js/sample2/application/directory/views/shell.js"></script>
    <script src="/js/sample2/application/directory/views/home.js"></script>
    <script src="/js/sample2/application/directory/views/contact.js"></script>
    <script src="/js/sample2/application/directory/views/employee.js"></script>
    <script src="/js/sample2/application/directory/filters.js"></script>
    <script src="/js/sample2/application/directory/controllers.js"></script>

    <!-- SELECT ONE (AND ONLY ONE) OF THE DATA PERSISTENCE SOLUTIONS BELOW -->

    <!-- Uncomment the script below to access the application data using Monaco's Local Cache -->
    <script src="/js/sample2/application/directory/models/model-local-cache.js"></script>

    <!-- Uncomment the script below to access the application data using an in-memory data store -->
    <!-- <script src="/js/sample2/application/directory/models/model-in-memory.js"></script> -->

    <!-- Uncomment the script below to access the application data using RESTful services. Open model-rest.js and adjust the URL attributes to reflect your URL endpoints. -->
    <!--<script src="/js/sample2/application/directory/models/model-rest.js"></script>-->

    <!-- Uncomment the script below to access the application data using RESTful services with JSONP. Open model-rest.js and adjust the URL attributes to reflect your REST endpoints. -->
    <!--<script src="/js/sample2/application/directory/models/model-rest-jsonp.js"></script>-->

    <!-- Uncomment the two scripts below to use Parse.com as the data persistence layer. -->
    <!--<script src="/js/sample2/lib/parse-1.2.2.min.js"></script>-->
    <!--<script src="/js/sample2/application/directory/models/model-parse-com.js"></script>-->

    <script src="/js/sample2/application/config.js"></script>

    <script>

        // Usually to start a Monaco application you just need to call the `start`
        // method of the application instance object. For this application it was
        // decided that the templates would be assyncrounsly loaded, and therefore
        // we need to wait untill all of them are loaded and properly assigned
        // to their views before starting the Monaco application.
        $(function() {

            // the `directory` string passed as the first argument will be used
            // when constructing the path for each template to be loaded
            window.app.utils.loadTemplates('directory',

                // list of templates to be assync loaded
                ['home', 'contact', 'shell', 'employee', 'employee-summary', 'employee-list-item'],

                // callback to be executed after the templates are loaded
                function() {

                    // templates are usually assigned to views on the view script
                    // definition, but since this application is assync loading
                    // them we are dynamically assigning them here to their
                    // respective view classes before starting the application
                    window.app.views.Home.prototype.template = _.template(app.templates['home']);
                    window.app.views.Contact.prototype.template = _.template(app.templates['contact']);
                    window.app.views.Shell.prototype.template = _.template(app.templates['shell']);
                    window.app.views.Employee.prototype.template = _.template(app.templates['employee']);
                    window.app.views.EmployeeSummary.prototype.template = _.template(app.templates['employee-summary']);
                    window.app.views.EmployeeListItem.prototype.template = _.template(app.templates['employee-list-item']);

                    // start the application
                    window.app.start();
                }
            );
        });
    </script>
</body>
</html>