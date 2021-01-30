<div id="pipingHeaderImage">
    
</div>

<div class="hTaps row">
    <div class="col col-lg-12 heads">
        <ul id="settingItems" class="cont">
            <li id="homePage" class="active"><?= $text_nav_home?></li>
            <li id="aboutPiping"><?= $text_nav_about?></li>
            <li id="products"><?= $text_nav_products?></li>
            <li id="projects"><?= $text_nav_projects?></li>
            <li id="inquiry"><?= $text_nav_inquiry?></li>
        </ul>
    </div>
    <div class="col col-lg-12 contents">
        <ul id="contentsSections" class="cont">
            <li class="homePageContents">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error minus incidunt deserunt, quod dignissimos consectetur placeat. A harum, natus tempore temporibus sit nemo explicabo, corporis omnis unde est architecto velit. </li>
            <li class="aboutPipingContents">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore sint harum dolores. Ratione nostrum nobis at tempore repellat consequatur impedit, voluptates fuga, quidem sed voluptate perspiciatis esse qui mollitia. Minus, aperiam. Cupiditate, eaque. Adipisci non nostrum quam consequuntur eos nobis, atque cupiditate libero, dolores voluptas culpa eveniet, enim inventore perspiciatis.</li>
            <li class="productsContents">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus et recusandae ea!</li>
            <li class="projectsContents">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae necessitatibus, qui vel temporibus, facilis assumenda voluptate perspiciatis, eveniet reiciendis veniam vitae? Repudiandae rerum enim placeat natus, quos numquam voluptas odio delectus sequi molestiae ratione veritatis a fuga obcaecati, deserunt saepe autem vero doloremque praesentium itaque incidunt nemo. Accusantium, reprehenderit. Non inventore, autem voluptates maxime excepturi quia amet minima numquam, ad assumenda, incidunt repellat alias deleniti sequi molestias repudiandae! Quisquam earum in eaque maiores aliquam sed temporibus. Fuga id soluta molestiae nostrum natus dicta dolorem quam maxime quia! Excepturi, quam cum aperiam tempore cumque qui explicabo facilis suscipit molestias. Ab, illo!</li>
            <li class="inquiryContents">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam eaque soluta, sed corrupti, nam possimus impedit eligendi animi ipsum quidem dolor consectetur repudiandae praesentium suscipit mollitia voluptatibus! Corporis, accusantium provident.</li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    var settingItems = ["homePage", "aboutPiping", "products", "projects", "inquiry"];
    var settingContents = document.querySelectorAll("#contentsSections li");
    window.onclick = function (e) {
        console.log(settingItems.indexOf(e.target.id) == -1);
        if (settingItems.indexOf(e.target.id) == -1) {
            return true;
        } else {
            for (i = 0; i < settingContents.length; i++) {
                document.getElementById(settingItems[i]).classList.remove('active')
                settingContents[i].style.display = "none";
            }
            e.target.classList.add('active')
            document.querySelector(
                ".contents ul li." + e.target.id + "Contents"
            ).style.display = "block";
        }
    };
</script>
