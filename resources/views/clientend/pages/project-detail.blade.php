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
.plan-layout {
  display: grid;
  grid-template-columns: minmax(0, 5fr) minmax(0, 7fr);
  gap: 24px;
  width: 100%;
  padding: 24px;
  align-items: start;
}

.book-wrap {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.book {
  position: relative;
  width: 100%;
  aspect-ratio: 2480 / 1755;
  perspective: 2200px;
}

.book::before {
  content: "";
  position: absolute;
  top: 2%;
  bottom: 2%;
  left: 50%;
  width: 2px;
  margin-left: -1px;
  background: rgba(0, 0, 0, 0.25);
  z-index: 0;
}

.book__leaf {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  transform-origin: left center;
  transform-style: preserve-3d;
  transition: transform 0.9s cubic-bezier(0.645, 0.045, 0.355, 1);
  cursor: pointer;
}

.book__leaf.is-turned {
  transform: rotateY(-180deg);
}

.book__face {
  position: absolute;
  inset: 0;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  background: #fff;
  border: 1px solid #d8d3c8;
  overflow: hidden;
}

.book__face--front {
  border-radius: 0 6px 6px 0;
  box-shadow: inset 8px 0 14px -10px rgba(0, 0, 0, 0.45), 4px 4px 12px rgba(0, 0, 0, 0.18);
}

.book__face--back {
  transform: rotateY(180deg);
  border-radius: 6px 0 0 6px;
  background: #f5f2ea;
  box-shadow: inset -8px 0 14px -10px rgba(0, 0, 0, 0.45), -4px 4px 12px rgba(0, 0, 0, 0.18);
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding-bottom: 12px;
  color: #8a8478;
  font-size: 12px;
}

.book__face img {
  width: 100%;
  height: calc(100% - 30px);
  object-fit: contain;
  display: block;
}

.book__caption {
  height: 30px;
  line-height: 30px;
  text-align: center;
  font-size: 11px;
  font-weight: 600;
  color: #333;
  border-top: 1px solid #eee;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  padding: 0 6px;
}

.book__cover {
  background: #12324f;
  color: #fff;
  border-color: #0c2338;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 24px;
}

.book__cover h2 {
  color: #fff;
  font-size: 22px;
  line-height: 1.3;
  margin: 0 0 8px;
}

.book__cover p {
  color: #9fc3e0;
  font-size: 13px;
  margin: 0;
}

.book__controls {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}

.book__controls button {
  background: #12324f;
  color: #fff;
  border: 0;
  border-radius: 4px;
  padding: 8px 14px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.15s ease;
}

.book__controls button:hover:not(:disabled) {
  background: #00aeef;
}

.book__controls button:disabled {
  opacity: 0.4;
  cursor: default;
}

.book__counter {
  font-size: 14px;
  color: #444;
  font-variant-numeric: tabular-nums;
}

.main-viewer {
  height: 80vh;
  background: #111;
  overflow: hidden;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: grab;
  border-radius: 6px;
}

.main-viewer:active {
  cursor: grabbing;
}

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

#displayImage {
  max-width: 90%;
  max-height: 80%;
  object-fit: contain;
  user-select: none;
  -webkit-user-drag: none;
  transform-origin: center center;
  transition: transform 0.05s ease-out;
}

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

@media (max-width: 991px) {
  .plan-layout {
    grid-template-columns: 1fr;
    padding: 12px;
  }

  .main-viewer {
    height: 60vh;
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


</style>
@endsection
@section('main')
    @php
        $planSection = $content->section('floor_plans');
        $plans = $planSection->visibleItems();
        $firstPlan = $plans->first();
    @endphp
    <section class="branch-section pb-0">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: center; padding-top: 120px;">
            <div class="branch__container p-0">
                <div class="plan-layout">
                    <div class="book-wrap">
                        <div class="book" id="book">
                            <div class="book__leaf" data-caption="{{ $firstPlan?->title }}" data-src="{{ $firstPlan?->src() }}">
                                <div class="book__face book__face--front book__cover">
                                    <h2>{{ $planSection->title ?: 'Floor Plans' }}</h2>
                                    <p>{{ $plans->count() }} pages</p>
                                </div>
                                <div class="book__face book__face--back"></div>
                            </div>
                            @foreach ($plans as $plan)
                                <div class="book__leaf" data-caption="{{ $plan->title }}" data-src="{{ $plan->src() }}">
                                    <div class="book__face book__face--front">
                                        <img src="{{ $plan->src() }}" alt="{{ $plan->title }}" @unless ($loop->first) loading="lazy" @endunless>
                                        <div class="book__caption">{{ $plan->title }}</div>
                                    </div>
                                    <div class="book__face book__face--back">{{ $loop->iteration }}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="book__controls">
                            <button type="button" id="bookPrev">Previous page</button>
                            <span class="book__counter" id="bookCounter"></span>
                            <button type="button" id="bookNext">Next page</button>
                        </div>
                    </div>

                    <div class="main-viewer" id="mainViewer">
                        <div class="zoom-controls">
                            <button id="zoomInBtn" title="Zoom In">+</button>
                            <button id="zoomOutBtn" title="Zoom Out">−</button>
                            <button id="resetBtn" title="Reset View">⟲</button>
                        </div>

                        <img src="{{ $firstPlan?->src() }}" id="displayImage" alt="{{ $firstPlan?->title }}">
                        <div class="main-caption" id="mainCaption">{{ $firstPlan?->title }}</div>
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

const book = document.getElementById('book');
const leaves = Array.from(book.querySelectorAll('.book__leaf'));
const prevBtn = document.getElementById('bookPrev');
const nextBtn = document.getElementById('bookNext');
const counter = document.getElementById('bookCounter');
let turned = 0;

function stackLeaves() {
  leaves.forEach((leaf, i) => {
    leaf.style.zIndex = i < turned ? i + 1 : leaves.length - i;
  });
}

function showInViewer(leaf) {
  if (!leaf.dataset.src) return;
  displayImage.src = leaf.dataset.src;
  displayImage.alt = leaf.dataset.caption;
  mainCaption.innerText = leaf.dataset.caption;
  resetTransforms();
}

function refreshBook() {
  prevBtn.disabled = turned === 0;
  nextBtn.disabled = turned >= leaves.length - 1;
  counter.innerText = turned === 0 ? 'Cover' : `Page ${turned} of ${leaves.length - 1}`;
  showInViewer(leaves[Math.min(turned, leaves.length - 1)]);
}

// The moving leaf has to stay above both stacks until it lands, then the stacks are re-ordered.
function turnTo(target) {
  if (target < 0 || target > leaves.length - 1 || target === turned) return;

  const leaf = leaves[target > turned ? turned : target];
  leaf.style.zIndex = leaves.length * 2;
  leaf.classList.toggle('is-turned', target > turned);
  turned = target;
  leaf.addEventListener('transitionend', stackLeaves, { once: true });
  refreshBook();
}

leaves.forEach((leaf, i) => {
  leaf.addEventListener('click', () => turnTo(i < turned ? i : i + 1));
});
prevBtn.addEventListener('click', () => turnTo(turned - 1));
nextBtn.addEventListener('click', () => turnTo(turned + 1));
document.addEventListener('keydown', (e) => {
  if (e.key === 'ArrowRight') turnTo(turned + 1);
  if (e.key === 'ArrowLeft') turnTo(turned - 1);
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

stackLeaves();
refreshBook();

    </script>

@endsection