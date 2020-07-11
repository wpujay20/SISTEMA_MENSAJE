            $(document).ready(function () {
                $("#menu").hover(
                        function () {
                            $(this).stop().animate({left: "0px"}, 700, "easeInSine");
                        }   //termina la funcion y el animate
                ,
                        function () {
                            $(this).stop().animate({left: "-125px"}, 700, "easeOutBounce");
                        }
                );
            });