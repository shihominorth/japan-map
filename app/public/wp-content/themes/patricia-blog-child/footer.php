<?php
/**
 * The template for displaying the footer.
 *
 * @package patricia-blog
 */
?>

	  </div><!-- #end row -->
	</div><!-- #end container-->
	
	<footer id="colophon" class="site-footer">

		<div class="container">
			<?php
				/* Footer Logo */
				get_template_part('template-parts/footer-logo');
				/* Social Icon */
				get_template_part('template-parts/social-footer'); 
				/* Copyright */
				do_action( 'patricia_blog_footer' );
			?>
		</div><!-- .container -->
		
	</footer><!-- #colophon -->
	
</div><!-- #end wrapper-->

<?php wp_footer(); ?>
</body>

<script>
    function selectedArea() {
      console.log("called");

      const kanto = [
        "茨城県",
        "千葉県",
        "東京都",
        "栃木県",
        "埼玉県",
        "神奈川県",
        "群馬県",
      ];
      const tohoku = [
        "青森県",
        "秋田県",
        "岩手県",
        "宮城県",
        "福島県",
        "山形県",
      ];

      const hokkaido = ["北海道"];

      const chubu = [
        "新潟県",
        "石川県",
        "富山県",
        "福井県",
        "長野県",
        "山梨県",
        "愛知県",
        "静岡県",
        "岐阜県",
      ];

      const shikoku = ["高知県", "香川県", "徳島県", "愛媛県"];

      const kinki = [
        "大阪府",
        "三重県",
        "滋賀県",
        "京都府",
        "奈良県",
        "和歌山県",
        "兵庫県",
      ];

      const kyushu = [
        "福岡県",
        "大分県",
        "熊本県", 
        "長崎県",
        "佐賀県",
        "宮崎県",
        "鹿児島県",
        "沖縄県"
      ]

      const chugoku = [
        "広島県",
        "鳥取県",
        "島根県",
        "岡山県",
        "山口県"
      ]

      var prefectures = [];

      var areas = document.getElementById("areas_selection");
      var option = areas.options[areas.selectedIndex].text;

      document.getElementById("prefectures").innerHTML = "";

      switch (option) {
        case "関東":
          prefectures = kanto;
          break;

        case "東北":
          prefectures = tohoku;
          break;

        case "北海道":

        prefectures = hokkaido;
        
        break;

        case "中部":

        prefectures = chubu;
        
        break;

        case "近畿":

        prefectures = kinki;
        
        break;

        case "四国":

        prefectures = shikoku;
        
        break;

        case "中国":

        prefectures = chugoku;
        
        break;

        case "九州":

        prefectures = kyushu;
        
        break;

        default:
          break;
      }

      prefectures.forEach((element) => {
        document.getElementById("prefectures").innerHTML +=
          '<div class="prefecture"><button type="button">' + element + "</button></div>";
      });
    }
  </script>

	
</html>