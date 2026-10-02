@extends('clientend.layouts.master')
@section('title','Project Detail')
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
/* Master Layout Split */


/* Master Container: Fixed Viewport Box */
.viewer-container {
  display: flex;
  width: 100%;
  height: 100vh; /* Locks layout height perfectly to the view window */
  align-items: stretch; /* Forces sidebar to perfectly match main-viewer height */
}

/* 20% Left Sidebar - SCROLLABLE CONFIGURATION */
.thumbnail-sidebar {
  width: 20%;
  height: 100%; /* Spans full height of the parent container */
  background: #1e1e1e;
  padding: 15px;
  
  /* Enables independent scrolling for large list sizes */
  overflow-y: scroll; 
  overflow-x: hidden;
  
  display: flex;
  flex-direction: column;
  gap: 15px;
  border-right: 2px solid #2d2d2d;
}

/* Customized Sidebar Scrollbar Track Elements */
.thumbnail-sidebar::-webkit-scrollbar {
  width: 6px;
}

.thumbnail-sidebar::-webkit-scrollbar-track {
  background: #151515;
}

.thumbnail-sidebar::-webkit-scrollbar-thumb {
  background: #3a3a3a;
  border-radius: 4px;
}

.thumbnail-sidebar::-webkit-scrollbar-thumb:hover {
  background: #555;
}

/* Individual Thumbnail Content Modules */
.thumb-wrapper {
  width: 100%;
  display: flex;
  flex-direction: column;
  background: #252525;
  border: 2px solid transparent;
  border-radius: 6px;
  overflow: hidden;
  cursor: pointer;
  flex-shrink: 0; /* Prevents thumbnails from smashing or collapsing */
  transition: border-color 0.2s, background 0.2s;
}

.thumb-wrapper:hover {
  border-color: #555;
  background: #2c2c2c;
}

.thumb-wrapper.active {
  border-color: #007bff;
  background: #2a2a2a;
}

.thumb {
  width: 100%;
  height: auto;
  object-fit: cover;
  display: block;
}

/* Thumbnail Subtitle Styling */
.thumb-caption {
  color: #aaa;
  font-size: 11px;
  padding: 6px 8px;
  text-align: center;
  word-break: break-all;
  border-top: 1px solid #2d2d2d;
}

.thumb-wrapper.active .thumb-caption {
  color: #fff;
  font-weight: bold;
}

/* 80% Right Canvas Area */
.main-viewer {
  width: 80%;
  height: 100%;
  background: #111;
  overflow: hidden;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: grab;
}

.main-viewer:active {
  cursor: grabbing;
}

/* Floating Controls Layer Block */
.zoom-controls {
  position: absolute;
  top: 20px;
  right: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 10;
}

.zoom-controls button {
  width: 45px;
  height: 45px;
  background: rgba(30, 30, 30, 0.85);
  color: #fff;
  border: 1px solid #444;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 4px 6px rgba(0,0,0,0.3);
  transition: background 0.2s, transform 0.1s;
}

.zoom-controls button:hover {
  background: #007bff;
  border-color: #007bff;
}

/* Main Display Asset */
#displayImage {
  max-width: 90%;
  max-height: 80%;
  object-fit: contain;
  user-select: none;
  -webkit-user-drag: none;
  transform-origin: center center;
  transition: transform 0.05s ease-out;
}

/* Main Viewer Bottom Fixed Subtitle Overlay */
.main-caption {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background: rgba(20, 20, 20, 0.9);
  color: #fff;
  text-align: center;
  padding: 15px 20px;
  font-size: 14px;
  letter-spacing: 0.5px;
  border-top: 1px solid #252525;
  z-index: 5;
  pointer-events: none;
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


</style>
@endsection
@section('main')
    <section class="branch-section pb-0">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: center; padding-top: 120px;">
            <div class="branch__container p-0">
                <div class="viewer-container">
                  <!-- Left Side: Thumbnails (20%) -->
                  <div class="thumbnail-sidebar">
                        <div class="thumb-wrapper active">
                            <img src="{{asset('assets/brochure/BASEMENT_FLOOR_PLAN.jpg')}}" class="thumb" alt="BASEMENT FLOOR PLAN">
                            <div class="thumb-caption">BASEMENT FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/GROUND_FLOOR_PLAN.jpg')}}" class="thumb" alt="GROUND FLOOR PLAN">
                            <div class="thumb-caption">GROUND FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/1ST_FLOOR_PLAN.jpg')}}" class="thumb" alt="1st FLOOR PLAN">
                            <div class="thumb-caption">1ST FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/2ND_TO_5TH_FLOOR_PLAN.jpg')}}" class="thumb" alt="2nd to 5th FLOOR PLAN">
                            <div class="thumb-caption">2ND To 5TH FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/5TH_FLOOR_PLAN-1.jpg')}}" class="thumb" alt="5th FLOOR PLAN 1">
                            <div class="thumb-caption">5TH FLOOR PLAN 1</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/5TH_FLOOR_PLAN.jpg')}}" class="thumb" alt="5th FLOOR PLAN">
                            <div class="thumb-caption">5TH FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/8TH_FLOOR_PLAN.jpg')}}" class="thumb" alt="8th FLOOR PLAN">
                            <div class="thumb-caption">8TH FLOOR PLAN</div>
                        </div>
                        <div class="thumb-wrapper">
                            <img src="{{asset('assets/brochure/9TH_FLOOR_PLAN.jpg')}}" class="thumb" alt="9th FLOOR PLAN">
                            <div class="thumb-caption">9TH FLOOR PLAN</div>
                        </div>
                  </div>
        
                  <!-- Right Side: Main Display (80%) -->
                  <div class="main-viewer" id="mainViewer">
                     <div class="zoom-controls">
                          <button id="zoomInBtn" title="Zoom In">+</button>
                          <button id="zoomOutBtn" title="Zoom Out">−</button>
                          <button id="resetBtn" title="Reset View">⟲</button>
                        </div>
                    
                        <img src="{{asset('assets/brochure/BASEMENT_FLOOR_PLAN.jpg')}}" id="displayImage" alt="Main Display">
                        <div class="main-caption" id="mainCaption">BASEMENT FLOOR PLAN</div>
                  </div>
                </div>
            </div>        
        </div>
    </section>
@endsection
@section('page-script')
    <script>
const mainViewer = document.getElementById('mainViewer');
const displayImage = document.getElementById('displayImage');
const mainCaption = document.getElementById('mainCaption');
const thumbWrappers = document.querySelectorAll('.thumb-wrapper');

const zoomInBtn = document.getElementById('zoomInBtn');
const zoomOutBtn = document.getElementById('zoomOutBtn');
const resetBtn = document.getElementById('resetBtn');

let scale = 1;
let translateX = 0;
let translateY = 0;
let isDragging = false;
let startX = 0;
let startY = 0;

const MIN_SCALE = 0.4;
const MAX_SCALE = 6;
const ZOOM_SPEED = 0.15;

thumbWrappers.forEach(wrapper => {
  wrapper.addEventListener('click', function() {
    thumbWrappers.forEach(w => w.classList.remove('active'));
    this.classList.add('active');
    
    const targetImg = this.querySelector('.thumb');
    const targetCaptionText = this.querySelector('.thumb-caption').innerText;
    
    displayImage.src = targetImg.src;
    mainCaption.innerText = targetCaptionText;
    
    resetTransforms();
  });
});

function updateTransform() {
  displayImage.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
}

function resetTransforms() {
  scale = 1;
  translateX = 0;
  translateY = 0;
  updateTransform();
}

zoomInBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  scale = Math.min(scale + 0.3, MAX_SCALE);
  updateTransform();
});

zoomOutBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  scale = Math.max(scale - 0.3, MIN_SCALE);
  updateTransform();
});

resetBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  resetTransforms();
});

mainViewer.addEventListener('wheel', (e) => {
  e.preventDefault(); 
  if (e.deltaY < 0) {
    scale = Math.min(scale + ZOOM_SPEED, MAX_SCALE);
  } else {
    scale = Math.max(scale - ZOOM_SPEED, MIN_SCALE);
  }
  updateTransform();
}, { passive: false });

mainViewer.addEventListener('mousedown', (e) => {
  if(e.target.closest('.zoom-controls')) return;
  isDragging = true;
  startX = e.clientX - translateX;
  startY = e.clientY - translateY;
});

window.addEventListener('mousemove', (e) => {
  if (!isDragging) return;
  e.preventDefault();
  translateX = e.clientX - startX;
  translateY = e.clientY - startY;
  updateTransform();
});

window.addEventListener('mouseup', () => {
  isDragging = false;
});

mainViewer.addEventListener('mouseleave', () => {
  isDragging = false;
});

    </script>

@endsection