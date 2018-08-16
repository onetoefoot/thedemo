// import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
// import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

const hljs = require('highlight.js/lib/highlight');

(function syntaxHighlighting() {

    hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
    hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
    hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
    hljs.initHighlighting();

})();