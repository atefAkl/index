
<div class="cont">

    <!--Carousel start Section-->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="5"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item carousel-item active" data-bs-interval="5000">
                <img src="/img/img1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL"><?= $text_caption_1 ?></h2>
                    <p class="caption">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="item carousel-item" data-bs-interval="5000">
                <img src="/img/img2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_2 ?>
                    </h2>
                    <p class="caption">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="item carousel-item"  data-bs-interval="5000">
                <img src="/img/img3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_3 ?>
                    </h2>
                    <p class="caption">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="item carousel-item"  data-bs-interval="5000">
                <img src="/img/img4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_4 ?>
                    </h2>
                    <p class="caption">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="item carousel-item"  data-bs-interval="5000">
                <img src="/img/img5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_5 ?>
                    </h2>
                    <p class="caption">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="item carousel-item"  data-bs-interval="5000">
                <img src="/img/img6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_6 ?>
                    </h2>
                    <p class="caption">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="item carousel-item" data-bs-interval="5000">
                <img src="/img/img7.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="title textXL">
                        <?= $text_caption_7 ?>
                    </h2>
                    <p class="caption">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="left carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="right carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!--Carousel End Section-->

</div>

<nav id="navbar">
    <div class="cont">
        <div class="brand">
            <div id="brandIcon">
                <img src="http://www.aei.co/assets/icons/icon.png" alt="">
            </div><h2 class="textShiny"><?= $text_menu_brand; ?></h2>
        </div>
        <div id="menu">
            <ul>
                <li><a href="#aboutUs" id="about"><?= $text_menu_aboutus; ?></a></li>
                <li class="dropdown">
                    <a class="navLink ddToggle" data-toggle="#products">
                        <?= $text_menu_products; ?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="ddMenu"  id="products">
                        <li><a class="ddItem" href="/piping/create"><?= $text_sub_menu_pipes; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_pumps; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_valves; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_instruments; ?></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_custom_fabrication; ?></a></li>
                    </ul>
                </li>
                <li>
                    <a class="navLink ddToggle" data-toggle="#projects"><?= $text_menu_projects; ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="ddMenu"  id="projects">
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_fuel_system; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_pump_station; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_swgrpnl; ?></a></li>
                        <li><a class="ddItem" href="#">Building Construction</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_wells_pump_installation; ?></a></li>
                    </ul>

                </li>
                <li>
                    <a class="navLink ddToggle" data-toggle="#services"><?= $text_menu_services; ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="ddMenu"  id="services">
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_psha; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_psi; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_hydraulic_study; ?></a></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_wtp_construction; ?></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="ddItem" href="#"><?= $text_sub_menu_design_build; ?></a></li>
                    </ul>
                </li>
                <li><a href="contents/news.php" id="news"><?= $text_menu_news; ?></a></li>
                <li><a href="contents/jobs.php" id="jobs"><?= $text_menu_news; ?></a></li>
                <li><a href="#contactUs" id="contact"><?= $text_menu_news; ?></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-content">
    <div id="social" class="social">
        <i class="fa fa-facebook fa-2x"></i>
        <i class="fa fa-twitter fa-2x"></i>
        <i class="fa fa-youtube fa-2x"></i>
        <i class="fa fa-snapchat fa-2x"></i>
        <i class="fa fa-linkedin fa-2x"></i>
    </div>
    <div class="cont">



        <section id="company">
            <h2 class="text-center textXL">AEICO COMPANY</h2>
            <p class="container text-center textLg">We own a wide range of manufacturing and supply of components, and that not only allow us to realize of each type of installation, but also we enables the user to modify, alter or improve existing equipment.
                <b>AEICO-KSA</b> group with their own branches:
            </p>

            <div id="branches" class="gallery">
                <div class="galleryContainer">
                    <div class="gItem" style="background-image: url('/img/3.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Pipes &amp;Fittings</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>
                        <!--<div class="show">
                            <img src="assets/bg/galleryItemNo-1.jpg" alt="">
                        </div>-->
                    </div>
                    <div class="gItem" style="background-image: url('/img/2.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Pumps &amp;Motors</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>
                    </div>
                    <div class="gItem" style="background-image: url('/img/1.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Instruments &amp;Sensors</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>

                    </div>
                    <div class="gItem" style="background-image: url('/img/1.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">valves &amp;Flow Control</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>

                    </div>
                    <div class="gItem" style="background-image: url('/img/2.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Testing &amp;Commissioning</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>

                    </div>
                    <div class="gItem" style="background-image: url('/img/3.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Welding &amp; Fabrication</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>

                    </div>
                    <div class="gItem" style="background-image: url('/img/3.jpg'); background-size: 100% 100%;">
                        <div class="desc">
                            <div class="gItemTitle textLg">Operating &amp; Maintenance</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto cumque dolor error esse quaerat qui repellat suscipit tempore, voluptatibus! Ducimus, saepe!</p>
                            <button><a href="/contents/products.php?s=pipes">See More . . </a></button>
                        </div>
                        <div class="show">
                            <img src="assets/bg/galleryItemNo-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="indicators">
                    <span class="left">&#10094</span>
                    <span class="right">&#10095</span>
                </div>
            </div>

        </section>
        <section id="intro">
            <h2 class="textShiny text-center textXL">Introduction</h2>
            <p class="textN">
                <b>AEICO-KSA</b> with its branches are the manufacturers / distributors for tools &amp;
                equipment for water processing &amp; treatment, various water treatment plants
                construction, manufacture and supply of carbon-steel and stainless-steel pipes
                &amp; fittings, assembling and performance for testing all kinds of pumps, all kind of
                valves, all low &amp; medium voltage panels and automation systems.
                <br>
                We create installations, consistent with the investment, operating and
                maintenance costs, and implemented in accordance with your needs. Our
                extensive experience and proven quality equipment guarantee high reliability.
                <br>
                We take responsibility for monitoring the impacts of plant operation and
                maintenance, leaving the client free to focus on their core business activity.
                Based on our expertise, we optimize existing installations and make processes
                more efficient. It is a force that makes us particularly desirable partner in the
                treatment of water.
                <br>
                Oriented towards the customer, flexible and able to quickly respond to the
                demands of our customers, we carry out work in projects with short delivery time
                and at the most competitive prices. By identifying the weakness of tomorrow
                today, we became a link between the traditional experience and high-tech
                future. Our intention is to offer our facilities implement the latest technology of
                processing water for industry and households, increasing the quality and
                competitiveness of our customers, while reducing the cost of water production.
                <br>
                We are at your disposal for all inquiries, offers, advice and consultation.
                <br>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sincerely,
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>AEICO-KSA</b>
            </p>
        </section>
        <section id="aboutUs">
            <h2 class="textShiny text-center textXL">About Us</h2>
            <p class="textN">
                <b>AEICO-KSA</b> was founded more of 38 years in <b>K.S.A</b>, with a very clear and consistent aim of "purification and treatment of water."
            </p>
            <p class="textN">
                From its founding until today AEICO-KSA is the largest and most comprehensive company with its large customer list in K.S.A, surpasses all other competitors. With the establishment of its branches in major regions of K.S.A closer to its knowledge, quality and experience to all customers and clients to quickly and efficiently solve water problems.
            </p>
            <p class="textN">
                AEICO-KSA has a wide range of different products in order to meet the various needs of our clients.
            </p>
            <p class="textN">
                We planning, design, manufacture, install and serve the systems for water treatment with the latest technologies for various industries, microelectronics, power, water and water treatment plants... .
            </p>
            <p class="textN">
                The expert team of engineers in design work closely with our production departments:
            </p>
            <ul class="homeUl">
                <li>PD - Production Departments. </li>
                <li>SCD  - Servicing &amp; Control Department. </li>
                <li>ED Engineering Department </li>
                <li>SMD  - Sales &amp; Marketing Department </li>
                <li>WFT  - Welding &amp; Fabrication Team</li>
                <li>WHD  - Water Hammer Department </li>
                <li>TCD  - Testing &amp; Commissioning Department</li>
            </ul>

            <p class="textN">
                Although AEICO-KSA works in projects throughout various zones in K.S.A and Middle East, they are able to take in cases of ambiguity in design professionally and quickly they can consult with our fellow engineers from abroad.
            </p>
            <p class="textN">
                AEICO-KSA Sales and Marketing announcing for our products in the most efficient ways.
            </p>
            <p class="textN">
                Our staff is water great care of our customers and they regularly visit to get the most accurate and highest quality information to our installed and installed devices, and to promptly advise and assist it in resolving any complications.
            </p>
            <p class="textN">
                Our objectives according to business vision,
            </p>
            <h2 class="text-center" style="color: #444; text-shadow: 1px 1px 0 #000">WE NOT ONLY LOOKING FOR CLINENT SATISFACTION, <br>BUT WE AIM TO ACHIEVE THE CLIENT HAPPINESS</h2>

        </section>
        <section id="we">
            <h2 class="textShiny text-center textXL">Who Are We</h2>
            <div class="textN">
                <h3>Mission</h3>
                AEICO-KSA commits to a sustainable environment through providing effective
                water management solutions and treatment systems, environmentally friendly
                technologies and alternative energy solutions to reconcile the ever-growing
                demand for water and its dwindling natural resources. &nbsp;&nbsp;&nbsp;<a href="contents/profile.php">See More ...</a>
            </div>
            <div class="textN">
                <h3>Vision</h3>
                AEICO-KSA strives to become the National provider of choice for sustainable,
                intelligent water and energy management solutions and systems. The group
                pledges to lead by example and to influence others to do likewise. &nbsp;&nbsp;&nbsp;<a href="contents/profile.php">See More ...</a>
            </div>
            <div class="textN">
                <h3>Objectives</h3>
                <b>Customer Focus  </b>
                Every employee is customer satisfaction driven. We commit to provide our
                clients with value-added products and services and to achieve high returns on
                investments for our shareholders; we further strive to exceed their expectations
                and keep them continuously informed through personable, honest and open
                communications.&nbsp;&nbsp;&nbsp;<a href="contents/profile.php">See More ...</a>

            </div>
        </section>
        <section id="contactUs">
            <div class="row">
                <div class="col col-lg-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1789.6087889099163!2d44.033117!3d26.222119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x69ce46490cbad56d!2sGamas%20Factory%20Co.%20advanced%20electromechanical%20industries!5e0!3m2!1sen!2sus!4v1611635859519!5m2!1sen!2sus" width="100%" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <form id="contactUsForm" class="col col-lg-5" action="contents/contact.php">
                    <h2 class="textShiny text-left textXL">Contact Us</h2>
                    <div class="formRow">
                        <label for="name"></label>
                        <input id="name" class="fluid" type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="formRow">
                        <label for="email"></label>
                        <input id="email" class="fluid" type="text" name="email" placeholder="Your Email">
                    </div>
                    <div class="formRow">
                        <label for="subject"></label>
                        <input id="subject" class="fluid" type="text" name="subject" placeholder="Type the subject">
                    </div>
                    <div class="formRow">
                        <label for="message"></label>
                        <textarea id="message" class="fluid" type="text" name="message" rows="10" placeholder="Type Your Message Here">
Type your message
					</textarea>
                    </div>
                    <div class="formRow">
                        <input type="submit" name="send" value="Send">
                    </div>
                </form>
            </div>

        </section>
        <section id="brands">
            <ul>
                <li><img class="col" src="http://www.aei.co/assets/brands/siemens.logo.jpg" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/ABB.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/ACC.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/AQC.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/AV1.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/CIMBERIO-Vrijstaand.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/cerafiltec.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/cnp.jpg" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/nwc.jpeg" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/gmas.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/grandmas.jpg" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/jutapipe.png" alt=""></li>
                <li><img class="col" src="http://www.aei.co/assets/brands/logo@2x.png" alt=""></li>
            </ul>
        </section>
    </div>
</div>