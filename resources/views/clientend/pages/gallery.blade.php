@extends('clientend.layouts.master')
@section('title','Gallery')
@section('page-style')
<style>
@media screen and (max-width: 991px) {
            .widget-visible iframe:first-child {
          all: unset;
          bottom: 76px !important;
      }
      .widget-visible iframe:nth-child(2) {
          all: unset;
          bottom: 145px !important;
      }
      .widget-visible iframe:nth-child(4) {
          all: unset;
          bottom: 85px !important;
      }

        .error-placeholder::placeholder {
            color: red !important;
        }
    }

        .truncate-text {
            width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media(max-width:520px){
            .truncate-text{
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                font-size:14px;
                text-align:left;
            }
        }
        .pagination {
        display: flex;
        justify-content: center;
        /* margin: 20px 0; */
        list-style: none;
    }

    .page-item {
        margin: 0 5px;
    }

    .page-link {
        color: #007bff;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        color: white;
    }

    .page-item.disabled .page-link {
        color: #aaa;
        pointer-events: none;
        border-color: #ddd;
    }
/* Gallery Layout */
#my-gallery {
  padding: 50px 20px;
  background-color: #f9f9f9;
}
.gallery-container {
  max-width: 1200px;
  margin: 0 auto;
}
#my-gallery h2 {
  text-align: center;
  margin-bottom: 30px;
  color: #333;
  font-family: sans-serif;
}
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
}
.gallery-item {
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  background-color: #fff;
  cursor: pointer;
  transition: transform 0.3s ease;
  
  /* Forces the box to be a consistent height */
  height: 250px; 
}
.gallery-item:hover {
  transform: translateY(-5px);
}

/* Updated Image Style */
.gallery-item img {
  width: 100%;
  height: 100%;
  
  /* This is the magic line: it crops the image to fit without stretching! */
  object-fit: cover; 
  
  display: block;
}

/* Lightbox Background Overlay */
.lightbox {
  display: none; 
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
}

/* Lightbox Image Box */
.lightbox-content {
  margin: auto;
  display: block;
  max-width: 80%;
  max-height: 80%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 4px;
}

/* Lightbox Caption text */
#lightbox-caption {
  width: 80%;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  position: absolute;
  bottom: 20px;
  left: 10%;
  font-family: sans-serif;
}

/* Close Button */
.lightbox-close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  cursor: pointer;
  z-index: 10001;
}
.lightbox-close:hover {
  color: #bbb;
}

/* Navigation Arrows Styles */
.lightbox-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: none;
  font-size: 30px;
  padding: 15px 20px;
  cursor: pointer;
  border-radius: 5px;
  transition: background 0.3s;
  z-index: 10000;
  user-select: none;
}
.lightbox-arrow:hover {
  background: rgba(255, 255, 255, 0.3);
}
#prev-btn {
  left: 20px;
}
#next-btn {
  right: 20px;
}


</style>
@endsection
@section('main')
<section class="branch-section pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center; padding-top: 120px;">
            <div class="branch__container p-0" id="my-gallery">
                <div class="gallery-container">
                    <h2>Our Gallery</h2>
                    <div class="gallery-grid">
                        <!-- Item 1 -->
                        <div class="gallery-item">
                            <img src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-View.jpg')}}" alt="Sun Wave View" class="lightbox-trigger">
                        </div>
                        <!-- Item 2 -->
                        <div class="gallery-item">
                            <img src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg')}}" alt="Sun Wave Front View" class="lightbox-trigger">
                        </div>
                        <!-- Item 3 -->
                        <div class="gallery-item">
                            <img src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/couple-suite.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/11.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/12.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/13.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/18.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/26.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/28.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/1.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/2.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/3.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/4.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/5.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/6.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/7.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/20.png')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/image-1.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/image-2.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/image-3.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>
                        
                        <div class="gallery-item">
                            <img src="{{asset('assets/gallery/sunwave/image-4.jpg')}}" alt="Couple Suite" class="lightbox-trigger">
                        </div>


                    </div>
                </div>    
            </div>        
        </div>
    </section>
    <!-- Lightbox Modal Container -->
    <div id="gallery-lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    
    <!-- Navigation Arrows -->
    <button class="lightbox-arrow" id="prev-btn">&#10094;</button>
    <button class="lightbox-arrow" id="next-btn">&#10095;</button>
    
    <img class="lightbox-content" id="lightbox-img" src="" alt="">
    <div id="lightbox-caption"></div>
    </div>    

@endsection
@section('page-script')
<script>
// Get lightbox elements
const lightbox = document.getElementById("gallery-lightbox");
const lightboxImg = document.getElementById("lightbox-img");
const captionText = document.getElementById("lightbox-caption");
const closeBtn = document.querySelector(".lightbox-close");
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

// Get all images as a list
const images = Array.from(document.querySelectorAll(".lightbox-trigger"));
let currentIndex = 0;
let autoSlideInterval = null; // Stores the interval ID
const SLIDE_DURATION = 3000;  // Time per slide in milliseconds (3 seconds)

// Function to update the lightbox content
function showImage(index) {
  currentIndex = index;
  const currentImg = images[currentIndex];
  lightboxImg.src = currentImg.src;
  captionText.innerHTML = currentImg.alt;
}

// Function to open next image (loops back to start if at the end)
function showNext() {
  let nextIndex = (currentIndex + 1) % images.length;
  showImage(nextIndex);
}

// Function to open previous image (loops to end if at the start)
function showPrev() {
  let prevIndex = (currentIndex - 1 + images.length) % images.length;
  showImage(prevIndex);
}

// Function to start auto slide
function startAutoSlide() {
  stopAutoSlide(); // Clear any existing interval first to prevent speed duplication
  autoSlideInterval = setInterval(showNext, SLIDE_DURATION);
}

// Function to stop auto slide
function stopAutoSlide() {
  if (autoSlideInterval) {
    clearInterval(autoSlideInterval);
    autoSlideInterval = null;
  }
}

// Function to reset timer on manual interaction
function resetAutoSlide() {
  startAutoSlide();
}

// Add click events to gallery images to open lightbox
images.forEach((image, index) => {
  image.addEventListener("click", () => {
    lightbox.style.display = "block";
    showImage(index);
    startAutoSlide(); // Start sliding when opened
  });
});

// Arrow Button Click Events
nextBtn.addEventListener("click", (e) => {
  e.stopPropagation(); // Stops lightbox from closing when clicking arrow
  showNext();
  resetAutoSlide();    // Reset timer so it doesn't skip immediately after manual click
});

prevBtn.addEventListener("click", (e) => {
  e.stopPropagation(); // Stops lightbox from closing when clicking arrow
  showPrev();
  resetAutoSlide();    // Reset timer on manual click
});

// Close lightbox when clicking the 'X' button
closeBtn.addEventListener("click", () => {
  lightbox.style.display = "none";
  stopAutoSlide();     // Stop sliding when closed
});

// Close lightbox when clicking anywhere on the dark background
lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) {
    lightbox.style.display = "none";
    stopAutoSlide();   // Stop sliding when closed
  }
});

// Keyboard Navigation Support
document.addEventListener("keydown", (e) => {
  if (lightbox.style.display === "block") {
    if (e.key === "ArrowRight") {
      showNext();
      resetAutoSlide();
    } else if (e.key === "ArrowLeft") {
      showPrev();
      resetAutoSlide();
    } else if (e.key === "Escape") {
      lightbox.style.display = "none";
      stopAutoSlide();
    }
  }
});


</script>

@endsection