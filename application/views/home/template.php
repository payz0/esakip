<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-SAKIP Kobar</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/fontawesome-5.5/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/slick/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/templatemo-style.css" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script> -->
    <style>
      #bocor{
        min-height: 160px;
        padding: 7% 0px;
        width: 203px;
        box-shadow: 3px 7px 4px 1px black;
        background: #e6e6e6;
        color: #5f5fdc;
        background-image: url('<?php echo base_url(); ?>../assets/img/doc.png');
        background-size: 100%;
          }
    </style>
  </head>
  <body >    
    <section id="home" class="text-white tm-font-big tm-parallax">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">              
        <div class="container">   
          <div class="tm-next">
              <a href="#home" class="navbar-brand">E-SAKIP Kobar</a>
          </div>             
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#tentang">Info</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#laporan">Laporan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#contact">Kontak</a>
              </li>
              <li class="nav-item" onclick="window.location = '<?php echo base_url('login'); ?>'">
                  <a class="nav-link tm-nav-link" href="#">Login</a>
                 
              </li>                    
            </ul>
          </div>   
               
        </div>
       
      </nav>
     
      <div class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
            <h2 class="tm-hero-title">E-SAKIP</h2>
            <p class="tm-hero-subtitle">
            Sistem Akuntabilitas Kinerja Instansi Pemerintah
              <br />Kotawaringin Barat
            </p>
        </div>        
      </div>

      <div class="tm-next tm-intro-next">
        <a href="#tentang" class="text-center tm-down-arrow-link">
          <i class="fas fa-3x fa-caret-down tm-down-arrow"></i>
        </a>
      </div>      
    </section>

    <section id="tentang" class="tm-section-pad-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img src="<?php echo base_url(); ?>../assets/img/entry_data.jpg" alt="Image" class="img-fluid tm-intro-img" />
          </div>
          <div class="col-lg-6">
            <div class="tm-intro-text-container">
                <h2 class="tm-text-primary mb-4 tm-section-title">Info E-SAKIP</h2>
                <p class="mb-4 tm-intro-text">
                Sistem Akuntabilitas Kinerja Instansi Pemerintah yang selanjutnya disingkat SAKIP, adalah rangkaian sistematik dari berbagai aktivitas, alat, dan prosedur yang dirancang untuk tujuan penetapan dan pengukuran, pengumpulan data, pengklasifikasian, pengikhtisaran, dan pelaporan kinerja pada instansi pemerintah, dalam rangka pertanggungjawaban dan peningkatan kinerja instansi pemerintah
              </p>
                <!-- <div class="tm-next">
                  <a href="#work" class="tm-intro-text tm-btn-primary">Read More</a>
                </div> -->
            </div>
          </div>
        </div>


    </section>
    <section id="laporan" class="tm-section-pad-top">
      <div class="container tm-container-gallery">
        <div class="row">
          <div class="text-center col-12">
              <h2 class="tm-text-primary tm-section-title mb-4">Pelaporan</h2>
              <!-- <p class="mx-auto tm-work-description"></p> -->
          </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                      <!-- <a href="<?php echo base_url()?>/pages"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/perencanaan.png');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">RPJMD</h1> 
                          <figcaption>
                            <a href="<?php echo base_url()?>pages/laporan/1/<?php echo Date('Y');?>">
                              <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                            </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/doc.png');background-size:100%;background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">RENSTRA</h1> 
                          <figcaption>
                            <a href="<?php echo base_url()?>pages/laporan/2/<?php echo Date('Y');?>">
                              <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                            </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/pengukuran.png');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">RKP</h1> 
                          <figcaption>
                            <a href="<?php echo base_url()?>pages/laporan/3/<?php echo Date('Y');?>">
                              <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                            </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/cekList.jpg');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">PK</h1> 
                          <figcaption>
                            <a href="<?php echo base_url()?>pages/laporan/4/<?php echo Date('Y');?>">
                              <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                            </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/salaman.png');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">LKJIP</h1> 
                          <figcaption>
                            <a href="<?php echo base_url()?>pages/laporan/5/<?php echo Date('Y');?>">
                              <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                            </a> 
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/pelaporan.png');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;font-size:22pt">RENCANA AKSI</h1> 
                          <figcaption>
                          <a href="<?php echo base_url()?>pages/laporan/6/<?php echo Date('Y');?>">
                            <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                          </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                        <!-- <a href="img/gallery-img-01.jpg"> -->
                        <figure class="effect-honey tm-gallery-item" style="max-height:180px;padding: 6% 0px;background-image: url('<?php echo base_url(); ?>../assets/img/evaluasi.png');background-repeat:no-repeat" >
                         <h1 style="background: white;box-shadow: 0px 2px 7px 4px black;text-shadow: 3px 4px 3px black;">IKU</h1> 
                          <figcaption>
                          <a href="<?php echo base_url()?>pages/laporan/7/<?php echo Date('Y');?>">
                            <h2 style="bottom: 0px;"><i>Lihat Detail</i></h>
                          </a>
                          </figcaption>
                        </figure>
                      <!-- </a> -->
                     
                    </div>
                </div>                
            </div>        
          </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="tm-section-pad-top tm-parallax-2">
      <div class="container tm-container-contact">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 tm-section-title" style="font-size:18pt">Info Kontak</h2>
                <div class="mb-5 tm-underline">
                  <div class="tm-underline-inner"></div>
                </div>
                <!-- <p class="mb-5">
                  Nullam tincidunt, lacus a suscipit luctus, elit turpis tincidunt dui,
                  non tempus sem turpis vitae lorem. Maecenas eget odio in sapien ultrices
                  viverra vitae vel leo. Curabitur at elit eu risus pharetra pellentesque
                  at at velit.
                </p> -->
            </div>
            
            <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
              <a href="tel:0100200340" class="tm-contact-item-link">
                  <i class="fas fa-3x fa-phone mr-4" style="font-size:16pt"></i>
                  <span class="mb-0" >0532 - 6612159</span>
              </a>              
            </div>
            <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
              <a href="mailto:info@company.co" class="tm-contact-item-link">
                  <i class="fas fa-3x fa-envelope mr-4" style="font-size:16pt"></i>
                  <span class="mb-0" >info@kotawaringinbaratkab.go.id</span>
              </a>              
            </div>
            <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
              <a href="https://www.google.com/maps/place/-2.6927708,111.6320924" class="tm-contact-item-link">
                  <span>
                  <i class="fas fa-3x fa-map-marker-alt mr-4" style="font-size:16pt"></i>
                  <span class="mb-0" >Lokasi</span>
                  </span>
                  <ul style="font-size:10pt; color:white;list-style:none">
                    <li>JL. Sutan Syahrir No. 2, Pangkalan Bun,</li> 
                    <li>Kabupaten Kotawaringin Barat,</li>   
                    <li>Provinsi Kalimantan Tengah</li> 
                  </ul>
                  
              </a>      
              
            </div>
            <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
              <a href="https://www.google.com/maps/place/-2.6927708,111.6320924" class="tm-contact-item-link">
                    <div style="width: 100%">
                      <iframe style="min-width:80%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=dinas%20komunikasi%20dan%20informasi%20pangkalan%20bun+(setda%20kobar)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                      </iframe>
                    </div>
              </a>
          </div>
           
        </div>
      </div>
      <footer class="text-center small tm-footer">
          <p class="mb-0">
            Copyright &copy; 2020 diskominfo.kobar
          </p>
        </footer>
    </section>
    <script src="<?php echo base_url(); ?>../assets/js/jquery-1.9.1.min.js"></script>     
    <script src="<?php echo base_url(); ?>../assets/slick/slick.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/jquery.singlePageNav.min.js"></script>     
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

      // var login = function(){
      //   window.location = <?php echo base_url('login'); ?>
      // }

      function getOffSet(){
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if(windowHeight > 500) {
          _offset = 400;
        } 
        if(windowHeight > 680) {
          _offset = 300
        }
        if(windowHeight > 830) {
          _offset = 210;
        }

        return _offset;
      }

      function setParallaxPosition($doc, multiplier, $object){
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
          bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
        $object.css({"background-position" : bg_css });
      }

      // Parallax function
      // Adapted based on https://codepen.io/roborich/pen/wpAsm        
      var background_image_parallax = function($object, multiplier, forceSet){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if(forceSet) {
          setParallaxPosition($doc, multiplier, $object);
        } else {
          $(window).scroll(function(){          
            setParallaxPosition($doc, multiplier, $object);
          });
        }
      };

      var background_image_parallax_2 = function($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({"background-attachment" : "fixed"});
        $(window).scroll(function(){
          var firstTop = $object.offset().top,
              pos = $(window).scrollTop(),
              yPos = Math.round((multiplier * (firstTop - pos)) - 186);              

          var bg_css = 'center ' + yPos + 'px';

          $object.css({"background-position" : bg_css });
        });
      };
      
      $(function(){
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);   
        
        // Handle window resize
        window.addEventListener('resize', function(){
          background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e){          
          if($(document).scrollTop() > 120) {
            $('.tm-navbar').addClass("scroll");
          } else {
            $('.tm-navbar').removeClass("scroll");
          }
        });
        
        // Close mobile menu after click 
        $('#tmNav a').on('click', function(){
          $('.navbar-collapse').removeClass('show'); 
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav();        
        
        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 400, function(){
              window.location.hash = hash;
            });
          } // End if
        });

        // Pop up
        // $('.tm-gallery').magnificPopup({
        //   delegate: 'a',
        //   type: 'image',
        //   gallery: { enabled: true }
        // });

        // Gallery
        $('.tm-gallery').slick({
          dots: true,
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 2,
          responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
      });
    </script>
  </body>
</html>