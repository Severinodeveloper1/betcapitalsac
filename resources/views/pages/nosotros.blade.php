@extends('layouts.app')

@section('title', $page->meta_title ?? 'Nosotros - BET CAPITAL SAC')
@section('meta_description', $page->meta_description ?? '')

@section('content')
    <!-- Hero Section con Zoom Lento -->
    <section class="relative h-[50vh] min-h-[400px] flex items-center justify-center overflow-hidden bg-ocean-deep">
        <div class="absolute inset-0 z-0">
            @if (!empty($page->hero_image))
                <div class="w-full h-full bg-cover bg-center brightness-40 hero-image-zoom"
                    style="background-image: url('{{ str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset('storage/' . $page->hero_image) }}')">
                </div>
            @else
                <div class="w-full h-full bg-slate-800 hero-image-zoom"></div>
            @endif
            @if(!empty($page->hero_title) || !empty($page->hero_subtitle))
                <div class="absolute inset-0 bg-gradient-to-b from-ocean-deep/40 to-ocean-deep/90"></div>
            @endif
        </div>

        <div class="relative z-10 text-center px-margin max-w-5xl text-white scroll-reveal zoom-in visible">
            <h1 class="font-headline-xl text-headline-xl text-white">
                {!! str_replace(
                    'Crecimiento',
                    '<span class="text-electric-cyan border-b-2 border-electric-cyan/30 pb-1">Crecimiento</span>',
                    $page->hero_title,
                ) !!}
            </h1>
            <p class="font-body-lg text-body-lg text-surface-container-highest max-w-3xl mx-auto opacity-90 pt-4">
                {{ $page->hero_subtitle }}
            </p>
        </div>
    </section>

    <!-- Our Identity Bento Grid -->
    <section class="py-16 px-margin max-w-[1440px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

            <!-- Misión Card -->
            @if (!empty($page->section_data['mission_title']))
                <div
                    class="lg:col-span-5 bg-surface-container-lowest border border-outline-variant p-6 flex flex-col justify-between hover:border-transit-blue hover:shadow-md transition-all duration-300 rounded-sm scroll-reveal slide-left">
                    <div class="space-y-4">
                        <div
                            class="w-12 h-12 bg-surface-container-low rounded-sm flex items-center justify-center text-transit-blue">
                            <span
                                class="material-symbols-outlined text-2xl">{{ $page->section_data['mission_icon'] ?? 'track_changes' }}</span>
                        </div>
                        <h3 class="font-title-md text-title-md text-ocean-deep font-semibold">
                            {{ $page->section_data['mission_title'] }}</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            {{ $page->section_data['mission_content'] }}
                        </p>
                    </div>
                </div>
            @endif

            <!-- Team Photo Banner Card -->
            @if (!empty($page->section_data['team_image']))
                <div
                    class="lg:col-span-7 h-[360px] relative overflow-hidden rounded-sm shadow-sm scroll-reveal slide-right">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105"
                        style="background-image: url('{{ str_starts_with($page->section_data['team_image'], 'http') ? $page->section_data['team_image'] : asset('storage/' . $page->section_data['team_image']) }}')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-deep/90 via-ocean-deep/10 to-transparent">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <span
                            class="inline-block px-3 py-1 bg-electric-cyan/20 border border-electric-cyan/30 text-electric-cyan font-label-sm text-xs uppercase tracking-widest rounded-sm mb-2">Capital
                            Humano</span>
                        <h4 class="font-headline-lg text-headline-lg text-white font-bold">
                            {{ $page->section_data['team_title'] ?? 'Equipo Profesional Directivo' }}</h4>
                    </div>
                </div>
            @endif

            <!-- Visión Card (Large Row) -->
            @if (!empty($page->section_data['vision_title']))
                <div class="lg:col-span-12 bg-ocean-deep text-white p-12 rounded-sm shadow-sm scroll-reveal zoom-in">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                        <div
                            class="w-14 h-14 bg-white/10 rounded-sm flex items-center justify-center shrink-0 text-electric-cyan">
                            <span
                                class="material-symbols-outlined text-3xl">{{ $page->section_data['vision_icon'] ?? 'visibility' }}</span>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-title-md text-title-md text-electric-cyan font-semibold">
                                {{ $page->section_data['vision_title'] }}</h3>
                            <p class="font-body-md text-body-md text-white/90 leading-relaxed">
                                {{ $page->section_data['vision_content'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Compromiso Corporativo -->
            @if (!empty($page->section_data['team_description']))
                <div
                    class="lg:col-span-12 bg-surface-container-low border border-outline-variant p-6 rounded-sm scroll-reveal">
                    <h4 class="font-title-md text-title-md text-ocean-deep mb-2 font-semibold">Garantía Operativa y de
                        Seguridad</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        {{ $page->section_data['team_description'] }}
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
