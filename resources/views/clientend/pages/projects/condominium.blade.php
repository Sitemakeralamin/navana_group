@extends('clientend.layouts.master')
@section('title', $content->section('intro')->title ?: 'Nanova Condominium')
@section('page-style')
<style>
    :root {
        --condo-ink: #13283d;
        --condo-muted: #5b6b7b;
        --condo-line: #d9e1ea;
        --condo-surface: #eef3f8;
        --condo-accent: #00aeef;
    }

    .condo {
        padding: 150px 24px 0;
        color: var(--condo-ink);
    }

    .condo-intro {
        display: grid;
        grid-template-columns: minmax(0, 5fr) minmax(0, 6fr);
        gap: 48px;
        align-items: center;
    }

    .condo-status {
        display: inline-block;
        background: #fff4d6;
        color: #8a5a00;
        font-size: 13px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 3px;
        margin-bottom: 16px;
    }

    .condo-intro h1 {
        font-size: 44px;
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 8px;
        color: var(--condo-ink);
    }

    .condo-location {
        font-size: 17px;
        color: var(--condo-muted);
        margin-bottom: 24px;
    }

    .condo-description {
        font-size: 16px;
        line-height: 1.75;
        white-space: pre-line;
        margin-bottom: 32px;
    }

    .condo-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .condo-button {
        display: inline-block;
        padding: 12px 22px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 4px;
        border: 2px solid var(--condo-ink);
        transition: background-color 0.15s ease, color 0.15s ease;
    }

    .condo-button--primary {
        background: var(--condo-ink);
        color: #fff;
    }

    .condo-button--primary:hover {
        background: var(--condo-accent);
        border-color: var(--condo-accent);
        color: #fff;
    }

    .condo-button--plain {
        color: var(--condo-ink);
    }

    .condo-button--plain:hover {
        background: var(--condo-ink);
        color: #fff;
    }

    .condo-photo img {
        width: 100%;
        height: 440px;
        object-fit: cover;
        display: block;
    }

    .condo-photo p {
        font-size: 13px;
        color: var(--condo-muted);
        margin-top: 8px;
    }

    .condo-facts {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        border-top: 1px solid var(--condo-line);
        border-bottom: 1px solid var(--condo-line);
        margin: 64px 0;
    }

    .condo-facts div {
        padding: 20px 24px 20px 0;
    }

    .condo-facts dt {
        font-size: 13px;
        font-weight: 500;
        color: var(--condo-muted);
        margin-bottom: 4px;
    }

    .condo-facts dd {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }

    .condo-features {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
        gap: 48px;
        margin-bottom: 64px;
    }

    .condo-features h2,
    .condo-contact h2 {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
        color: var(--condo-ink);
    }

    .condo-feature-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .condo-feature-list li {
        padding: 18px 0;
        border-bottom: 1px solid var(--condo-line);
    }

    .condo-feature-list li:first-child {
        padding-top: 0;
    }

    .condo-feature-list h3 {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 6px;
        color: var(--condo-ink);
    }

    .condo-feature-list p {
        margin: 0;
        color: var(--condo-muted);
        line-height: 1.65;
    }

    .condo-contact {
        background: var(--condo-surface);
        padding: 40px;
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
        gap: 48px;
        margin-bottom: 64px;
    }

    .condo-contact dl {
        display: grid;
        grid-template-columns: max-content 1fr;
        gap: 10px 24px;
        margin: 0;
        font-size: 17px;
    }

    .condo-contact dt {
        color: var(--condo-muted);
        font-weight: 500;
    }

    .condo-contact dd {
        margin: 0;
        font-weight: 600;
    }

    .condo-contact a {
        color: var(--condo-ink);
    }

    .condo-contact a:hover {
        color: var(--condo-accent);
    }

    @media (max-width: 991px) {
        .condo {
            padding: 40px 16px 0;
        }

        .condo-photo img {
            height: 260px;
        }

        .condo-intro,
        .condo-features,
        .condo-contact {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .condo-intro h1 {
            font-size: 32px;
        }

        .condo-contact {
            padding: 24px 16px;
        }

        .condo-contact dl {
            grid-template-columns: 1fr;
            gap: 2px;
        }

        .condo-contact dd {
            margin-bottom: 10px;
        }
    }
</style>
@endsection
@section('main')
    @php
        $intro = $content->section('intro');
        $facts = $content->section('facts')->visibleItems();
        $features = $content->section('features');
        $contact = $content->section('contact');
        $phone = $contact->value('phone');
    @endphp
    <div class="container condo">
        <section class="condo-intro">
            <div>
                @if ($intro->subtitle)
                    <span class="condo-status">{{ $intro->subtitle }}</span>
                @endif
                <h1>{{ $intro->title }}</h1>
                @if ($intro->value('location'))
                    <p class="condo-location">{{ $intro->value('location') }}</p>
                @endif
                <p class="condo-description">{{ $intro->body }}</p>
                <div class="condo-actions">
                    @if ($phone)
                        <a class="condo-button condo-button--primary" href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">Call {{ $phone }}</a>
                    @endif
                    <a class="condo-button condo-button--plain" href="{{ url('/contact') }}">Contact us</a>
                </div>
            </div>
            @if ($intro->image)
                <div class="condo-photo">
                    <img src="{{ $intro->src() }}" alt="{{ $intro->value('image_caption') ?: $intro->title }}">
                    @if ($intro->value('image_caption'))
                        <p>{{ $intro->value('image_caption') }}</p>
                    @endif
                </div>
            @endif
        </section>

        @if ($facts->isNotEmpty())
            <dl class="condo-facts">
                @foreach ($facts as $fact)
                    <div>
                        <dt>{{ $fact->title }}</dt>
                        <dd>{{ $fact->subtitle }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif

        @if ($features->visibleItems()->isNotEmpty())
            <section class="condo-features">
                <h2>{{ $features->title }}</h2>
                <ul class="condo-feature-list">
                    @foreach ($features->visibleItems() as $feature)
                        <li>
                            <h3>{{ $feature->title }}</h3>
                            @if ($feature->body)
                                <p>{{ $feature->body }}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section class="condo-contact">
            <h2>{{ $contact->title }}</h2>
            <dl>
                @if ($phone)
                    <dt>Phone</dt>
                    <dd><a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a></dd>
                @endif
                @if ($contact->value('email'))
                    <dt>Email</dt>
                    <dd><a href="mailto:{{ $contact->value('email') }}">{{ $contact->value('email') }}</a></dd>
                @endif
                @if ($contact->value('address'))
                    <dt>Address</dt>
                    <dd>{{ $contact->value('address') }}</dd>
                @endif
            </dl>
        </section>
    </div>
@endsection
