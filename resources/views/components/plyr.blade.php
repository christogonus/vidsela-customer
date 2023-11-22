@props(['link' => ''])

@php
    $getSource = parse_url($link);

    if($link == '' || ! isset($getSource['host'])) {
        $getSource = parse_url(config("video.blank"));
    }

    if (str_contains($getSource['host'], 'youtube.com') || str_contains($getSource['host'], "youtu.be")){
        $source = "youtube";
    }else if (str_contains($getSource['host'], 'vimeo.com')){
        $source = "vimeo";
    }else {
        $source = 'custom';
    }

@endphp

@if($source == 'youtube' || $source == 'vimeo')

    {{-- embeded player --}}
    <div id="presenter" class="absolute aspect-video "
         data-plyr-provider="{{ $source }}"
         data-plyr-embed-id="{{ $link }}"
    ></div>

@else

    {{-- custom player --}}
    <video id="presenter"
           class="absolute aspect-video "
           playsinline controls
    >
        <source src="{{ $link }}" type="video/mp4" />
    </video>

@endif
