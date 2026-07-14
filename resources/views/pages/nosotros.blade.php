@extends('layouts.app')

@section('title', $page->meta_title ?? 'Nosotros - BETCAPITALSAC')
@section('meta_description', $page->meta_description ?? '')

@section('content')
<!-- Hero Section -->
<section class="relative h-[450px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        @if(!empty($page->hero_image))
            <div class="w-full h-full bg-cover bg-center transition-transform duration-1000 brightness-50" style="background-image: url('{{ $page->hero_image }}')"></div>
        @else
            <div class="w-full h-full bg-slate-800"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-primary/40 to-primary/85"></div>
    </div>
    <div class="relative z-10 text-center px-margin max-w-5xl text-white">
        <h1 class="font-headline-xl text-5xl md:text-6xl text-white mb-md tracking-tight leading-tight font-bold mb-4">
            {!! str_replace('Crecimiento', '<span class="text-primary-fixed-dim inline-block decoration-primary-fixed-dim/30 underline decoration-4 underline-offset-8">Crecimiento</span>', $page->hero_title) !!}
        </h1>
        <p class="font-body-lg text-lg md:text-xl text-surface-variant/90 max-w-3xl mx-auto font-light">
            {{ $page->hero_subtitle }}
        </p>
    </div>
</section>

<!-- Our Identity Bento -->
<section class="py-xl px-margin max-w-[1440px] mx-auto py-16">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter gap-6 items-stretch">
        
        <!-- Mission Card -->
        @if(!empty($page->section_data['mission_title']))
            <div class="md:col-span-5 bg-surface-container-lowest border border-outline-variant p-lg flex flex-col justify-between hover:shadow-xl transition-all duration-500 rounded-lg p-8 group">
                <div>
                    <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mb-lg bg-slate-100 mb-6 p-4">
                        <span class="material-symbols-outlined text-primary text-4xl">{{ $page->section_data['mission_icon'] ?? 'track_changes' }}</span>
                    </div>
                    <h3 class="font-headline-lg text-headline-lg text-primary mb-md text-2xl font-bold mb-3">{{ $page->section_data['mission_title'] }}</h3>
                    <p class="text-on-surface-variant font-body-lg leading-relaxed text-sm">
                        {{ $page->section_data['mission_content'] }}
                    </p>
                </div>
            </div>
        @endif

        <!-- Main Image Card -->
        @if(!empty($page->section_data['team_image']))
            <div class="md:col-span-7 h-[400px] relative overflow-hidden rounded-xl shadow-lg group">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-110" style="background-image: url('{{ $page->section_data['team_image'] }}')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-lg p-6 text-white">
                    <span class="inline-block px-3 py-1 bg-primary-fixed-dim text-primary-fixed font-label-bold text-xs uppercase tracking-widest mb-sm rounded-sm bg-white/20 mb-2">Nuestro Equipo</span>
                    <h4 class="text-white font-headline-lg text-3xl font-bold">{{ $page->section_data['team_title'] ?? 'Liderazgo con Visión Estratégica' }}</h4>
                </div>
            </div>
        @endif

        <!-- Vision Card -->
        @if(!empty($page->section_data['vision_title']))
            <div class="md:col-span-12 bg-primary text-on-primary p-lg flex flex-col justify-center rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 group p-8 text-white bg-slate-900 mt-6">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center p-4">
                        <span class="material-symbols-outlined text-primary-fixed text-4xl">{{ $page->section_data['vision_icon'] ?? 'visibility' }}</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-headline-lg text-headline-lg mb-md text-2xl font-bold mb-2">{{ $page->section_data['vision_title'] }}</h3>
                        <p class="font-body-lg text-white/90 leading-relaxed text-sm">
                            {{ $page->section_data['vision_content'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Team Details Section -->
        @if(!empty($page->section_data['team_description']))
            <div class="md:col-span-12 bg-surface-container-low border border-outline-variant p-lg rounded-xl p-8 mt-6">
                <h3 class="font-headline-lg text-primary text-2xl font-bold mb-4">Compromiso con la Excelencia</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed">
                    {{ $page->section_data['team_description'] }}
                </p>
            </div>
        @endif
    </div>
</section>
@endsection
