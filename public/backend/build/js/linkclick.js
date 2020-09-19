$(document).ready(function () {
            $("a").click(function (event) {
                var $this = $(this),
                    url = $this.attr('href');

                $(document.body).load(url);
               
            });
        });