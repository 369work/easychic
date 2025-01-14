jQuery(document).ready(function ($) {
    // customizer label change
    $('#customize-control-easychic_font_setting input[type="radio"]').each(
        function () {
            var value = $(this).val();
            var label = $(this).next("span");

            switch (value) {
                case "Noto Sans JP":
                    label.html(
                        '<span class="noto-sans-jp">Noto Sans JP</span>'
                    );
                    break;
                case "Noto Serif JP":
                    label.html(
                        '<span class="noto-serif-jp">Noto Serif JP</span>'
                    );
                    break;
                case "M PLUS Rounded 1c":
                    label.html(
                        '<span class="m-plus-rounded-1c">M PLUS Rounded 1c</span>'
                    );
                    break;
                case "Shippori Mincho":
                    label.html(
                        '<span class="shippori-mincho">Shippori Mincho</span>'
                    );
                    break;
            }
        }
    );
});
