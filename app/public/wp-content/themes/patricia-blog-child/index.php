<?php
/**
 * The main template file.
 *
 * @package patricia-blog
 */

get_header(); ?>

  <div id="root">
      <div id="japan_map">
        <img
          id="japan_map_img"
          src="https://japanmaptest.local/wp-content/uploads/2022/03/Japan_Map-1.png"
          alt="japan map"
        />
      </div>

      <div id="areas">
        <form>
          <select id="areas_selection" onchange="selectedArea()">
            <option value="地域を選んでください" selected>
              地域を選んでください
            </option>
            <option value="関東">関東</option>
            <option value="東北">東北</option>
            <option value="北海道">北海道</option>
            <option value="中部">中部</option>
            <option value="近畿">近畿</option>
            <option value="四国">四国</option>
            <option value="中国">中国</option>
            <option value="九州">九州</option>

          </select>
        </form>

        
        <div id="prefectures"></div>
      </div>

</div>
	
<?php get_footer(); ?>