<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\Page;
use App\Models\FleetCategory;
use App\Models\FleetVehicle;
use App\Models\Service;
use App\Models\Project;
use App\Models\Certification;
use App\Models\Partner;
use App\Models\Benefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Ejecutar ShieldSeeder para crear roles y permisos
        $this->call(ShieldSeeder::class);

        // 2. Crear administrador de prueba y asignarle el rol de super_admin
        $admin = User::create([
            'name' => 'Administrador BetCapital',
            'email' => 'admin@betcapitalsac.com',
            'password' => bcrypt('admin12345'),
        ]);

        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $admin->assignRole('super_admin');
        }

        // 3. Seed de Ajustes Generales
        GeneralSetting::create([
            'id' => 1,
            'office_address' => 'Av. Elmer Faucett 1234, Callao, Perú',
            'email' => 'contacto@betcapitalsac.com',
            'phone' => '+51 1 456 7890',
            'whatsapp_number' => '+51 912345678',
            'office_hours' => 'Lunes - Viernes: 8:00 AM - 6:00 PM | Sábados: 9:00 AM - 1:00 PM',
            'map_iframe_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.8845610738605!2d-77.1147573!3d-12.0169115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cb48bb2081cf%3A0xe54d588523efec9a!2sAv.%20Elmer%20Faucett%2C%20Callao!5e0!3m2!1ses!2spe!4v1700000000000',
            'seo_title' => 'BET CAPITAL SAC - Logística de Carga Pesada',
            'seo_description' => 'Especialistas en transporte intermodal y soluciones de cadena de suministro con los más altos estándares de seguridad y eficiencia operativa nacional.',
            'accounting_hero_title' => 'Servicios Contables Especializados para Transportistas',
            'accounting_hero_subtitle' => 'Ofrecemos soporte tributario y financiero integral para conductores y empresas de carga pesada, garantizando tranquilidad y cumplimiento con la SUNAT.',
            'accounting_hero_image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=1200',
            'accounting_form_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=600',
        ]);

        // 4. Seed de Páginas Estáticas (Inicio, Nosotros)
        Page::create([
            'slug' => 'inicio',
            'title' => 'Página de Inicio',
            'hero_title' => 'Liderando la Logística de Carga Pesada en los Principales Puertos del País',
            'hero_subtitle' => 'Especialistas en transporte intermodal y soluciones de cadena de suministro con los más altos estándares de seguridad y eficiencia operativa nacional.',
            'hero_cta_text' => 'Solicitar Cotización',
            'hero_cta_url' => '#contact',
            'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCTnEjCAK64n5ocS3GM3lSwL4NvnbFyVIekNd4Ml8-QQ1SefF_N3O1syZRx0lZ22iDeM4as8o25EJmIlQelP1NxgPdanFm5AtnXaE3knoMIcXhU6ziMTZM1058kcyT2KlvqMywonLgSby8lmziFENcRo9ZiJfGpkhareyIbLC9Y3_yS_9wgL8g2hWE_KEzx4DoKLdusWAeQVXaPQgBjfLBHPcZyqK-yCi58AB86NL87MeC-X_8X1_hl5rV2U6BeXCOxOFtHHHHPAoEh',
            'section_data' => [
                'empresa_homologada' => true,
                'homologation_title' => 'Homologación y Excelencia en Puertos',
                'homologation_description' => 'Estamos acreditados bajo las normativas más exigentes del sector logístico. Nuestra flota y personal cuentan con accesos permanentes y seguros a los principales terminales portuarios: DP World, APM Terminals y el Puerto de Pisco. Garantizamos una trazabilidad total y el cumplimiento riguroso de tiempos de entrega.',
                'homologation_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAfCTkgx0XZLYM7RG5a8jh41WwBwbv05YslP-nuELnH-Tm68ula8RR_W6ncqGVXe7R0mgmOtFGPkkoKHWB33eORYLGOD3tsf91NMv4s7lX6wKUlqr9J2VAmDgU17KUAJY8iV3qzJFWSh-bu9YiZn7nAE4YnYHw0rKF9WCWsEX-r-lVCNhGq8zlVw_5bjd1DSecA1TU7hHiRRgwvxb0Ors_TG1zFvMKylbV18htU99g1MPR-k-yx7e8hCGwsH4yktR6CNREfsX1oTIFr',
                'homologation_features' => [
                    ['title' => 'Certificación BASC', 'description' => 'Seguridad en el comercio global.', 'icon' => 'shield_check'],
                    ['title' => 'Eficiencia Operativa', 'description' => 'Minimización de tiempos muertos.', 'icon' => 'speed'],
                ]
            ]
        ]);

        Page::create([
            'slug' => 'nosotros',
            'title' => 'Nosotros',
            'hero_title' => 'Más que Logística, Impulsamos tu Crecimiento',
            'hero_subtitle' => 'Desde 2022, BET CAPITAL SAC redefine el transporte pesado en el Perú con integridad, precisión técnica y un compromiso inquebrantable con la excelencia operativa.',
            'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCp9taJPV3KMiK_vu0nVnMoZrY109zHM7NCkjJjR3x9-rT7glIUekcibBYlaesDKJUP_qswCdEu3Pm4Zn6wb-2l6Z9-DNAmwH26faannaJEI68zG2gyQoPKj41jXZnAnBCP-5w4EPmeyiYHIb2M8XneIL87UPBs3LHNA13dtddEsNkbRGqp7cuVvZ_NsHATc8gQG-E_qVGMmCm8ay82vFYa4WpB5B81969v__SZ55MTPkv8AT-wsI-JDDZf2pzOJJ3613QU21tcHXOm',
            'section_data' => [
                'mission_title' => 'Misión',
                'mission_content' => 'Proveer soluciones de transporte y logística integral que optimicen la cadena de suministro de nuestros clientes mediante tecnología de vanguardia y un capital humano altamente capacitado.',
                'mission_icon' => 'track_changes',
                'vision_title' => 'Visión',
                'vision_content' => 'Ser reconocidos para el 2027 como la empresa líder en soluciones logísticas de alta tonelaje en la región, siendo el socio estratégico preferido por nuestra confiabilidad, seguridad y sostenibilidad ambiental.',
                'vision_icon' => 'visibility',
                'team_title' => 'Liderazgo con Visión Estratégica',
                'team_description' => 'Nuestro equipo directivo y operativo cuenta con amplia trayectoria en el sector logístico, asegurando una toma de decisiones informada y de alta precisión.',
                'team_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBLv-qYyP5Av8rgu9z-DvhAxqBVi602ImsUd21tGWAtL8uzgMqS3nnZ6V7CCB1eiwTewO9T8jCW5AU0rgSwD0FydeouJTO8ighHXfJWwAhgQe7Rq6ZDsFygEOWq2uwjP7RqWkOSWSnlxUhsIV_0CtvM2PbmLH2mMTBirXs6QPvB61n1BouJ7Mw8_NqxdRhk8ZTZ7fcWHSXI8bcl-mzzJ7gjbDHPGryUS8zeJfcYuoiDSugFEXpjpFJpfRjyLKLuHyjDkSqUMRF8iyTJ',
            ]
        ]);

        // 5. Seed de Categorías de Flota
        $catHeavy = FleetCategory::create(['name' => 'Tráileres de Carga Pesada', 'slug' => 'traileres-carga-pesada']);
        $catMedium = FleetCategory::create(['name' => 'Camiones 10 TN', 'slug' => 'camiones-10-tn']);
        $catLight = FleetCategory::create(['name' => 'Furgones Urbanos', 'slug' => 'furgones-urbanos']);

        // 6. Seed de Vehículos de la Flota
        FleetVehicle::create([
            'category_id' => $catHeavy->id,
            'name' => 'Tráiler Volvo FH16',
            'slug' => 'trailer-volvo-fh16',
            'badge' => 'ALTA CAPACIDAD',
            'capacity' => '32 TN',
            'dimensions' => '13.6m L',
            'load_type' => 'Contenedores, Granel',
            'gps_status' => 'Activo',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBNiW6ff37nCSVdMkRb5KYWlhQJJcroVGyuOJgP_5B4NKXwnLljafuLlKCE3uqtEj9AZPSKC8-fbQv8MBuTAigaf7RHQqMVs65kiHMKnp5tAj77pdCiGNPPbqDKgwMC7rf-q_A6ikV__BmgljhVwfprSCDOoZm8Tgiyz4cU2WRUFqvoHwFzMp3JMu3yiOoFL96ftglyvWLQ-GCUk1c9RwcQaU3VxIQboRWck2Bfabo0KHfQKhzL3WkYUL3Emeym5w2PG5X47FU96_kR',
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        FleetVehicle::create([
            'category_id' => $catMedium->id,
            'name' => 'Camión Fuso FJ 1523',
            'slug' => 'camion-fuso-fj-1523',
            'badge' => 'URBANO',
            'capacity' => '10 TN',
            'dimensions' => '8.2m L',
            'load_type' => 'Carga General, Paletizada',
            'gps_status' => 'Activo',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAcyYuLQH-dcM2tbGxWkth6vOhDA9poybTNjyb5m97OSgIgeTsO7kA5qhnuKkHPmrLZpIqkOX1up7EDRqKn1b0KMMQuhTVQWpyzyf_13AS_TxheArTbMrElUcSSzlNxwYToL3ktWOdpWZV9_HZerchWoQNuoWTOVMTkXRFLL6ay75Z_cwdTjorEjn3zpgaqkY_zwILfKuYt7RmnEY3guLFo_yZTT1jXy8HbY-GpGsxt_CvmFtkNvU_DnWoMxUz4jX-yvT6rPqujuiD',
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        // 7. Seed de Servicios
        Service::create([
            'name' => 'Retiro y Depósito de Contenedores',
            'slug' => 'retiro-deposito-contenedores',
            'description' => 'Realizamos operaciones homologadas en DP World y APM Terminals. Gestionamos el flujo de contenedores con tiempos optimizados y monitoreo en tiempo real, asegurando la continuidad de sus importaciones y exportaciones.',
            'icon_name' => 'circle',
            'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCpYTlTCyi84LUICebTtP3tLH6DnUby-K87BhtgSTnPeHvRkoXXEwkDg3PyWhrksMAnMIOoClILX8__JDWw3G3IM1nICxitL0YW6cFJ_tNAonHk4Epk_us3IUaFWYU42Usq4DyPrODOKNoNFTWgjixj1lqvJvwUmny5U0WCrNkgLU7eU7UewNa50qqtxu806JQAWd8FVyF-f5JqUq0TDM_Iw3QfQ77cQ31FXec5DIXpfC665QU31s0sOjhDLq6I5rPi6_Bn095Ie4Ht',
            'cta_text' => 'Solicitar Cotización',
            'cta_url' => '#contact',
            'evidence_images' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCpYTlTCyi84LUICebTtP3tLH6DnUby-K87BhtgSTnPeHvRkoXXEwkDg3PyWhrksMAnMIOoClILX8__JDWw3G3IM1nICxitL0YW6cFJ_tNAonHk4Epk_us3IUaFWYU42Usq4DyPrODOKNoNFTWgjixj1lqvJvwUmny5U0WCrNkgLU7eU7UewNa50qqtxu806JQAWd8FVyF-f5JqUq0TDM_Iw3QfQ77cQ31FXec5DIXpfC665QU31s0sOjhDLq6I5rPi6_Bn095Ie4Ht',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDh1X0MM6Y7HUpFcMqnd4qTGj_H2JmQRwJCX7UjM7CeEGVYaqZV4jd4KrwyuMidEYRD_bRgE6bEp6sSk6-TQZp21czPMpo6bQRkBif82rFDESp6ByzL5iqlwLenvtaa5y1A-L7RCaHUt4nR5Qx1ubzBLFCpDoWB1fRJJ9E152LwiE1avLtbxeFMaUIRmBxxsPj0ABB3kILXKfUbRrqOktz8EiLEDxAlPBwNm6rD_JgvOhx8tG5W2NO8w5sUNCIVZyDMmykZWxWBud1u',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDAa_qVFLH7Jv-tF-ergJNQiNs9jNf1aswZkwEXUN5ZGo4dXVf-coGbOc694hjwQhF6aM1ihP1j1hYMS2BjAFokkN5wBrRh5cBwxBMFEndIR9c2kYovP-Yz21POdSkiOHws-PXDZe2gViLK_KgN5VyT57Kgh_KAEnMIcCip1jUm6QaZbnK8rm72hdzgYcs6KM4gE1a6CgUFSHGSS1rJGCeZs5mTFB7Nbl0KlaHxpc70_GAdTcqy1GZF9il3OjFo7vp_AXd8BX2fN2-8',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAzIMpWHq5FfFdj4J8sZ0CW-e6U3vfdyH3KhbYDVjQgkrcOuBhoeJU5LYjdAtGjOX1CwStk5YMgPhKmszwVk9u_8889SdmUeFmsucMzCtG3pe3y1id43xL6pIm_R3WZo5IqMVIyan3wfGZiUaz01NyAhc4hBdlLlpeSQaW2syfaxFtSXD8YbHUgTIBVaMUW9rRV_TdJ7FoPfZSZrfsjw9Cp3ObVDyfF_C5m2hGkpDMyHEr-EQju6Cwh53fH-kRsV9YJFKUrZ7T9_YyA'
            ],
            'sort_order' => 1,
        ]);

        Service::create([
            'name' => 'Transporte Nacional de Carga Pesada',
            'slug' => 'transporte-nacional-carga-pesada',
            'description' => 'Especialistas en gran tonelaje (25-40 TN). Contamos con una flota moderna equipada con GPS y conductores certificados, cubriendo rutas críticas en todo el territorio nacional con cumplimiento estricto de horarios.',
            'icon_name' => 'local_shipping',
            'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDvVUmXySLd7vMUhmSSYM1bPpNZJpWBe0f7TeA-qu74wVWdF2Eidi0rOpwE67seP1Jra6TjHeqYSjY7B8ZHzq0OHnZvyRvEe_32d8Sh5Ismdyt8t27qSeqWIm8tESNIlikh5Zd7mk2418KEzIslRdtvkk8K5FS4J6BX38_tonmvLO_nwTrVkxWJxCR7wL0e9iJmzuqIYaZU2z_hrrZCoqpkNi1s0FbTe7XNyq7l3nzMRPborQTvB3YOTrZPdeY1OcLSsWnTKs1gxeAK',
            'cta_text' => 'Cotizar Ruta',
            'cta_url' => '#contact',
            'evidence_images' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuB6x74qd_3ZkmqsBPE_AowDahKJVwJ05BoGfTeZ088t5SzcaDlJDobzeWPJpv49fw5WR_XBEiD80sMzwk6aHPi03JzdVtD_v5Oha61ZA0qxyzF0RBR4HuuHUCcZKoDxidpzZgPfLzySZJaTa2rGBVdCkoGCRxczLv6w8X8y_bIlcQy5UNGbSMPgqMGWBcxCTGey3mzJ39lEsFJGGkj5KdkmEBvOh26AcfYnSdYPiCpW0k_vXgp0S7K0h7it6SmLhtNgOjY0JLmbeSBA',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDvVUmXySLd7vMUhmSSYM1bPpNZJpWBe0f7TeA-qu74wVWdF2Eidi0rOpwE67seP1Jra6TjHeqYSjY7B8ZHzq0OHnZvyRvEe_32d8Sh5Ismdyt8t27qSeqWIm8tESNIlikh5Zd7mk2418KEzIslRdtvkk8K5FS4J6BX38_tonmvLO_nwTrVkxWJxCR7wL0e9iJmzuqIYaZU2z_hrrZCoqpkNi1s0FbTe7XNyq7l3nzMRPborQTvB3YOTrZPdeY1OcLSsWnTKs1gxeAK',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBFz-AZRf0_r-Z7_7VKoBzgiujW-EtjoOzUT6ICkV_BrWX6v6q6hBqWYvzXgoR15Eb4TWXwVb7wpO39wkMXJjJ7hrTJ-JGnHvJh-I2LFuwekR1NQpMRGFsRX_Lc5Ts2iG03ZJQ4G0_DCzH8Tmx0I8kM2YdeEJiFUfoKdFesZPG0UjONJXsyZhfgbRPcdSNjzDQ2fUmZ5_jl4A9OWiEpWvIn846sXSyEFdr0LuQUVLjQq_yzcoAo0uccEFarSv4USvJc8oXLWAFEOWfV',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAQW13ZhH2vbV0Cnw4RBqnDxvqnW0ar3biPx0YSTeiIIwS_52O_3dVOSwbOvMC3rtZH6tLAIsvvYeb9rTOcoViA1YF_8kXH8cHOEWjCdOobjpKbgWMTPayeNKhfA3-yv1dtn7BW4ApQQSvw9R0Zc2IG_FJmxqXEzXUOcTJ66k45TEiTBaNHioVgrseZ_Z_28orQk-kP2raaL9TeDy9DOBuVEiSk9tcIOXrjAKST2oFP1fPrxM1WH1_ZiCtdHlYDBGynpUGF7PirD3PJ'
            ],
            'sort_order' => 2,
        ]);

        Service::create([
            'name' => 'Soporte Contable Estratégico',
            'slug' => 'soporte-contable-estrategico',
            'description' => 'Asesoría tributaria especializada exclusivamente en el sector logístico. Optimizamos la gestión de detracciones (SPOT), declaraciones ante SUNAT y planificación financiera para empresas transportistas que buscan solidez y cumplimiento.',
            'icon_name' => 'account_balance_wallet',
            'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDWK8q_d--byuw1vw-mszFujBOqm_C0WTA9wqZcryH_bcElx8ovk2bMpnpDBbctftTL5HSYhJFf6IrVsHEmMXb8c6ZqGeKb5aexKhPKCIgVhdhzzyPnIUXOYvBv-8NWdeIDfn7uNr1a7-dLZrJff3w3iPZNrur2etj-nWzgDj8a3gV4g3ptWVl20zbHsQJe5oZGwFc_dvdMBd3abT66DeqFFPO6P025Y1Lk_WT8W1uFYl6CIT2xV1-FhZ_-uriKli5yUc-KvCyRUE4O',
            'cta_text' => 'Agendar Consultoría',
            'cta_url' => '#contact',
            'evidence_images' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDwXlX7fHhdUhWlrJ8W7hbAuqppwjnhx6uE5vhj9nC-2E_Q02aTNjZPs8hfNadRPFAHdv0ARDa2D0raX0n_Q_m0GG24Z3BBoagtcKqfnaWd_aMEmo1MuIl8h9SGdX8EwD0c5j8bWvSogySeWDHLz06R70fX5xlOVf9IRu1ziKmdrolMEkisiPZf5z5if44Xl99EessOmr1UeCfKuSwSmaW2JPqhRnT_t9FmuOgYsqZkm7Y7YN0Q7J1dc5srhI7kBOZxaL3GxQU9PikK',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuB0J4gEkcQQTFChKe_C7LL64xfW3txknXpIxShhxwEepgXU88321XH0I8c0uXRUd4xd3gjtOmW5gAdbQf3Uvu6G-EfnQqNATBt_I6FoufBi7TWmFAvBFpCi1KBpFPw4KosblSwYTy95BWHpx71hG2pYtvwvXmFl3czbt37TRC2t7VQhdYNlAwnGTQVpwkDalZ7Q3bwZru_pG0t3b1MBoljyKPIhYlZTP3EIzekISQ5_RDhjNatdbRrGL0sxjFQof6CagaxZrFUYQuyt',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuArqYS7AwI5-D7lbfw7Ps1wObPHsppY-_PowblqCdhsR1wO14_i7ZHZr4pnhDqj4vtNuDcvBCeLsx4NIO4DjFyDQweJA9lfnXq8tgtQ6MYD6GQNFlIHDBMubAiW1ts4z54Uyn1koEpzRmaubZ6EpG6QDvg8ie86hp0Fc6jZlTn3yag1lX7rWexPujYHkSLf2yK8-UOa_ZQd3VAXrm4ahQg1FlgFm4EwSaYh0iodT4rAvSPVuO-ehhLbgpOFLOvpQxS76600QMi5PjKC',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBch6j1EtJNYejhjbXqfFpGtr_brhZ8T0pZdWqwwpoM_rgAaKLtZJkQe7iRCyDPi7EviRcuZu0aVhGODbHgxl0eNz-aJIUFWfWmG-H3zdy5eNQBnruH3QVyspdOw6a-K16uk_efTsiQuRbsZHYlYlnB8noYsc9PraEJYS6Jy0lKK0l2kniv4fbx2PTScOKltPVk-bvtUasvB08kZSjmVa4CvRgE79JuijIQU2n2i8_U9D2c8IpRWTH5NZahy3PXJrj7THNdBDQ7qRVd'
            ],
            'sort_order' => 3,
        ]);

        // 8. Seed de Proyectos Masonry
        Project::create([
            'title' => 'Transporte de Turbinas Hidráulicas',
            'client_or_project' => 'Proyecto: Central Eléctrica Mantaro',
            'description' => 'Movilización exitosa de maquinaria pesada sobredimensionada utilizando escolta policial y camión cama baja por carreteras andinas.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCI_uyFBTidm9HyX7IQ39bBOalimaONn8gFq6MpUIVUaxis-zA7yd0by8afGJ9GhT2HsrnPgq4htgtyDdfuigO1aqTWCrNWC5gN2_M7cVJvqzju8RYlSc-Y_qm57D-Ch8RYgGsNpTqmiSM93YyUwQSLFJdIWI2JjhQhmzQS2BWJou2__ELZkZPKnudC7cN6TpRnd9nYmGqsgvG_ABnPp6nZC1EBNvpbjqtK8O9483falDS-X813CKKwBBEec5ur-fUdyHGi_q3eOozq',
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'Consolidación Maersk Line',
            'client_or_project' => 'Operación: Puerto del Callao',
            'description' => 'Servicios integrados de desaduanaje, transporte y depósito temporal de contenedores de alta prioridad.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC0mNJ1rLKJDeY3wMrMwYQLAaH6UsEe2-NLURIirGxXu25-n4Wx92MxNP4jcYoX9NYEuRHZgcFDzsta3lg7hVwZNxpbp5aAUVHlYqQrVPEkAXDw35_iFtKEH6bwGNJ_WmtxdYicQ5n8RBNcOqincQEEbVRhu550H2Zv_bHI_gmQGNVm86l26UmSe0yvCUzPAxfiYd2Co825ZuFsVM6myar4GsMriWVtgroC-4Mowq57a9hikVhpLpda7VxuSwgXUT1YjEIj8jcTKZws',
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Mantenimiento de Flota Premium',
            'client_or_project' => 'Estándar: Seguridad Total',
            'description' => 'Ejecución del programa mensual de mantenimiento preventivo riguroso en nuestro taller central para mitigar riesgos en ruta.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCAs4ETTi8zn6PQ6iV4M0myeIt31f6fwDDf1cPwHCpfB0DQWj2v_O0t2xOrsSnnUMsJvihlp-4IKVQ4Rmaz0EKtXsyLqeE_L5JiUoKO6griXxzh1bXpz0RgUaGD_jNRvTt1IVKlTEtMczxQOW0dfY8OlDs_FLj7ZQCjxY1f2ysGi8DxJnivDQfZ4329WvHP7D_BHFHYtQ3gqzGadngB6TzkX63cYMYsnFeRxTD1Nqb4aD6lt1twsSlIja5TaJ5I73lp2ddd-FkugRKM',
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        // 9. Seed de Certificaciones
        Certification::create([
            'title' => 'Certificación ODELPE',
            'validity' => 'Vigencia: 2024 - 2025',
            'description' => 'Seguridad y homologación certificada en el comercio nacional.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBRi82dGq4sqbvgkYieU9qJrgjQE9XhK0m3-vZhnXMU8uhA2S532WfrESHjPR-7kpV2c-ch0BbvOrl4DgOAL9HaFGn2NPWw5zG2rLHl76kTcVsYUZDtyJdZ82_i3SYSybduRcpd_KTL1rxLxT1EvBPG2XaOOu3Pat5b3t3mUVQ53fy06vBfRwOlPH0hDh2UHY1fiZLHKlUhfJ90WJrXfZOLECfeMNx30Ebl2pxN1NLAMU9GHVrE_4ANagO2a1iV6KNgHTyLxrr26hbW',
            'sort_order' => 1,
        ]);

        Certification::create([
            'title' => 'Seguro de Carga Internacional',
            'validity' => 'Póliza Global de Cobertura',
            'description' => 'Póliza de seguros contra todo riesgo para salvaguardar la mercadería de nuestros clientes.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAIxgyy9QyKXGJsedYyILXLoIjePrRdmpcEqUhyJXkLQnc6P-3-PQSAKR7lT2U18KWeK8owF6C-X846GL2qkiNL6URWq5G-Nk8skZpfPrFJGA6AJ2Z7vE2bhCpy2Vv58ayC0pGqp0bekW1Y96R3Xd-jE13w8oCj56bxcYyPk64t2ELLvcVLaPnUd35-jOP9JWyGjoykHXvClUAoPbxQUyiBeTG2PpxPoELIcJ97GjnvWoQ2BKWrSJ5_LIvAuSGgeHLvpNQUFVpOZxU2',
            'sort_order' => 2,
        ]);

        Certification::create([
            'title' => 'ISO 9001:2015',
            'validity' => 'Gestión de Calidad Logística',
            'description' => 'Estándar global de gestión de calidad en todos nuestros procesos administrativos y de transportes.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA5Hxvpixi7JIJn8jDSdRv7tTdtQz0_XuPakradhcwmQFVJXgladYOCu11xR6Vy4zubz6MIvTwCerX_HH986duPFaWIk_dizLHJFhAOnVOjTbHZ2U9jmpWQsf5I_I2urdC0jumauJZEfTS7QV7V6rI6_XgdM7FQPChlOLd65LVY3vRosTMhvQGG_pY-3DAuVS-_Ryrxmi6BPSdLXFbEsifnycjfUh-WcalRqHh9OAIIvpFGtE1yO6AlMmDcRvxJy9r43aMbCwyJrtJN',
            'sort_order' => 3,
        ]);

        Certification::create([
            'title' => 'Permiso de Carga Especial',
            'validity' => 'MTC - Transporte Pesado',
            'description' => 'Resolución ministerial del Ministerio de Transportes y Comunicaciones para carga sobredimensionada.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA9re_6Wmw6Nqq3ib63LaTzsRIqKlJK7dQKhBsZ_pSEohp_ZL92JNwZfYCDci1QCngfhY4-cEHK7-5tlHVtQ4HyT7ZyevccEjHN-f8Cm9QwN4pa5H9lswLUowlkXUcxO0elWyP2xeBvHHTMdh3GYGAFq0XxIoerBFfo2SbGMVu3X9e3iFyVSRykZTMLfr8sBZWKW8jwmV3i32JEMjuoE8RrrxArVewXb_MDyxz77NhwzIeFudRjIvUBEfTE833eJMyD8HW5YuNE0RNX',
            'sort_order' => 4,
        ]);

        // 10. Seed de Partners
        Partner::create(['name' => 'MAERSK', 'sort_order' => 1]);
        Partner::create(['name' => 'GRUPO PALMA', 'sort_order' => 2]);
        Partner::create(['name' => 'DP WORLD', 'sort_order' => 3]);
        Partner::create(['name' => 'APM TERMINALS', 'sort_order' => 4]);

        // 11. Seed de Beneficios
        Benefit::create([
            'title' => 'Pagos al Contado',
            'description' => 'Garantizamos liquidez inmediata para su operación con ciclos de pago ágiles y transparentes que respetan su esfuerzo.',
            'icon' => 'payments',
            'type' => 'general',
            'sort_order' => 1,
        ]);

        Benefit::create([
            'title' => 'Adelantos de Viáticos',
            'description' => 'No detenga su ruta. Ofrecemos adelantos estratégicos para combustible y gastos operativos antes de iniciar el servicio.',
            'icon' => 'local_gas_station',
            'type' => 'general',
            'sort_order' => 2,
        ]);

        Benefit::create([
            'title' => 'Soporte Contable',
            'description' => 'Asesoría especializada para transportistas, ayudándole a mantener su documentación en orden y optimizar su gestión fiscal.',
            'icon' => 'account_balance',
            'type' => 'general',
            'sort_order' => 3,
        ]);

        // Beneficios de Contabilidad para Transportistas
        Benefit::create([
            'title' => 'Gestión de Detracciones',
            'description' => 'Controlamos y optimizamos sus depósitos SPOT para evitar contingencias con la SUNAT y asegurar liquidez.',
            'icon' => 'payments',
            'type' => 'accounting',
            'sort_order' => 1,
        ]);

        Benefit::create([
            'title' => 'Declaraciones Mensuales',
            'description' => 'Elaboración y presentación oportuna de sus obligaciones tributarias (IGV-Renta) bajo el régimen que le corresponda.',
            'icon' => 'assignment',
            'type' => 'accounting',
            'sort_order' => 2,
        ]);

        Benefit::create([
            'title' => 'Asesoría Tributaria 24/7',
            'description' => 'Un equipo de contadores especializados en el sector transportes disponible para resolver sus consultas y guiarlo.',
            'icon' => 'support_agent',
            'type' => 'accounting',
            'sort_order' => 3,
        ]);

        // 12. Seed de Páginas Restantes (Servicios, Flota, Certificaciones, Contacto)
        \App\Models\Page::create([
            'slug' => 'servicios',
            'title' => 'Servicios',
            'hero_title' => 'Soluciones Logísticas de Carga Pesada a Nivel Nacional',
            'hero_subtitle' => 'Brindamos servicios integrados con altos estándares de seguridad y eficiencia operativa en puertos y carretera.',
            'hero_image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=1200',
        ]);

        \App\Models\Page::create([
            'slug' => 'flota',
            'title' => 'Nuestra Flota',
            'hero_title' => 'Flota Moderna con Monitoreo GPS y Control de Seguridad 24/7',
            'hero_subtitle' => 'Contamos con unidades especializadas listas para operar en los principales terminales portuarios del país.',
            'hero_image' => 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&q=80&w=1200',
        ]);

        \App\Models\Page::create([
            'slug' => 'certificaciones',
            'title' => 'Certificaciones',
            'hero_title' => 'Excelencia Operativa y Cumplimiento Normativo',
            'hero_subtitle' => 'Respaldamos cada operación con certificaciones internacionales y una trayectoria impecable en proyectos de alta complejidad.',
            'hero_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1200',
        ]);

        \App\Models\Page::create([
            'slug' => 'contacto',
            'title' => 'Contacto',
            'hero_title' => 'Canales de Atención y Soporte Directo',
            'hero_subtitle' => 'Conéctese con nuestro equipo comercial o solicite soporte contable especializado.',
            'hero_image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1200',
        ]);

        // 13. Seed de Documentos Legales (Términos y Privacidad)
        \App\Models\LegalDocument::create([
            'title' => '1. Aceptación de los Términos',
            'slug' => 'terms-aceptacion',
            'type' => 'terms',
            'sort_order' => 1,
            'content' => 'Al acceder y utilizar el sitio web de BET CAPITAL SAC, usted acepta y se compromete a cumplir con los presentes Términos de Servicio. Si no está de acuerdo con alguna parte de los términos, no debe utilizar nuestros servicios.',
        ]);

        \App\Models\LegalDocument::create([
            'title' => '2. Uso Autorizado de la Plataforma',
            'slug' => 'terms-uso',
            'type' => 'terms',
            'sort_order' => 2,
            'content' => 'Nuestra plataforma está destinada a proporcionar información sobre transporte de carga pesada y cotizaciones. Queda prohibido cualquier uso indebido, hackeo o intento de interrupción de los servidores.',
        ]);

        \App\Models\LegalDocument::create([
            'title' => '3. Limitación de Responsabilidad',
            'slug' => 'terms-responsabilidad',
            'type' => 'terms',
            'sort_order' => 3,
            'content' => 'BET CAPITAL SAC realiza sus mayores esfuerzos para asegurar la disponibilidad del sitio web. No nos hacemos responsables por daños indirectos derivados del uso o imposibilidad de uso del portal.',
        ]);

        \App\Models\LegalDocument::create([
            'title' => '1. Recolección de Datos Personales',
            'slug' => 'privacy-recoleccion',
            'type' => 'privacy',
            'sort_order' => 1,
            'content' => 'Recopilamos información personal a través de nuestros formularios (nombre, teléfono, correo electrónico, RUC/Documentos) únicamente con fines comerciales, de soporte contable o evaluación de transportistas.',
        ]);

        \App\Models\LegalDocument::create([
            'title' => '2. Uso y Finalidad de la Información',
            'slug' => 'privacy-finalidad',
            'type' => 'privacy',
            'sort_order' => 2,
            'content' => 'Los datos personales recopilados se tratan de conformidad con la Ley N° 29733 (Ley de Protección de Datos Personales en Perú). No vendemos ni compartimos sus datos con terceros sin autorización explícita.',
        ]);

        \App\Models\LegalDocument::create([
            'title' => '3. Derechos ARCO',
            'slug' => 'privacy-arco',
            'type' => 'privacy',
            'sort_order' => 3,
            'content' => 'Usted puede ejercer sus derechos de Acceso, Rectificación, Cancelación y Oposición (ARCO) enviando una solicitud formal a nuestro correo electrónico: contacto@betcapitalsac.com.',
        ]);
    }
}
