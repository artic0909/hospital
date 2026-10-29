<script>
    document.addEventListener('DOMContentLoaded', () => {

        // ==========================================
        // 1. MOBILE SIDEBAR DRAWER TOGGLE
        // ==========================================
        const sidebar = document.getElementById('partner-sidebar');
        const backdrop = document.getElementById('partner-sidebar-backdrop');
        const toggleBtn = document.getElementById('partner-sidebar-toggle-btn');
        const closeBtn = document.getElementById('partner-sidebar-close-btn');

        function openSidebar() {
            if (!sidebar || !backdrop) return;
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('opacity-0', 'pointer-events-none');
            backdrop.classList.add('opacity-100', 'pointer-events-auto');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            if (!sidebar || !backdrop) return;
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.remove('opacity-100', 'pointer-events-auto');
            backdrop.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (backdrop) backdrop.addEventListener('click', closeSidebar);

        // ==========================================
        // 2. REFERRAL MODAL TOGGLE
        // ==========================================
        window.openReferralModal = function() {
            const modal = document.getElementById('partner-referral-modal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }
        };

        window.closeReferralModal = function() {
            const modal = document.getElementById('partner-referral-modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        };

        // ==========================================
        // 3. TABLE FILTERING & SEARCH
        // ==========================================
        const searchInput = document.getElementById('partner-quick-search');
        const tableSearchInput = document.getElementById('table-filter-search');
        const statusFilterSelect = document.getElementById('table-status-filter');
        const tableRows = document.querySelectorAll('.referral-table-row');

        function filterTable() {
            const query = ((tableSearchInput ? tableSearchInput.value : '') || (searchInput ? searchInput.value : '')).toLowerCase().trim();
            const status = statusFilterSelect ? statusFilterSelect.value.toLowerCase().trim() : 'all';

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const rowStatus = (row.getAttribute('data-status') || '').toLowerCase();

                const matchesQuery = !query || text.includes(query);
                const matchesStatus = status === 'all' || rowStatus === status;

                if (matchesQuery && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        if (tableSearchInput) tableSearchInput.addEventListener('input', filterTable);
        if (searchInput) searchInput.addEventListener('input', filterTable);
        if (statusFilterSelect) statusFilterSelect.addEventListener('change', filterTable);

        // ==========================================
        // 4. APEXCHARTS INITIALIZATION
        // ==========================================
        if (typeof ApexCharts !== 'undefined') {
            const chartConfig = window.dashboardChartData || {};

            // ------------------------------------------
            // CHART 1: BAR CHART - Referrals & Admissions Trend
            // ------------------------------------------
            const barChartEl = document.querySelector("#chart-referrals-bar");
            if (barChartEl) {
                const monthlyLabels = (chartConfig.monthly && chartConfig.monthly.labels && chartConfig.monthly.labels.length) 
                    ? chartConfig.monthly.labels 
                    : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'];
                const monthlyReferrals = (chartConfig.monthly && chartConfig.monthly.referrals && chartConfig.monthly.referrals.length) 
                    ? chartConfig.monthly.referrals 
                    : [14, 18, 22, 28, 24, 32, 38, 42, 48, 52];
                const monthlyAdmissions = (chartConfig.monthly && chartConfig.monthly.admissions && chartConfig.monthly.admissions.length) 
                    ? chartConfig.monthly.admissions 
                    : [8, 11, 15, 19, 18, 23, 27, 31, 35, 38];

                const barOptions = {
                    series: [
                        {
                            name: 'Referrals Received',
                            data: monthlyReferrals
                        },
                        {
                            name: 'Hospital Admissions',
                            data: monthlyAdmissions
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 310,
                        toolbar: { show: false },
                        fontFamily: 'inherit'
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '48%',
                            borderRadius: 6,
                            borderRadiusApplication: 'end'
                        }
                    },
                    colors: ['#27797D', '#EF7415'],
                    dataLabels: { enabled: false },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: monthlyLabels,
                        labels: {
                            style: { colors: '#64748b', fontSize: '11px', fontWeight: 600 }
                        },
                        axisBorder: { show: false },
                        axisTicks: { show: false }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#64748b', fontSize: '11px' }
                        }
                    },
                    grid: {
                        borderColor: '#f1f5f9',
                        strokeDashArray: 4,
                        padding: { left: 10, right: 10 }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        fontSize: '12px',
                        fontWeight: 600,
                        markers: { radius: 12 }
                    },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function (val) {
                                return val + " Patients";
                            }
                        }
                    }
                };

                const barChart = new ApexCharts(barChartEl, barOptions);
                barChart.render();
            }

            // ------------------------------------------
            // CHART 2: DONUT / PIE CHART - Specialty Distribution
            // ------------------------------------------
            const donutChartEl = document.querySelector("#chart-specialty-donut");
            if (donutChartEl) {
                const specialtySeries = (chartConfig.specialty && chartConfig.specialty.series && chartConfig.specialty.series.length) 
                    ? chartConfig.specialty.series 
                    : [44, 36, 28, 22, 18];
                const specialtyLabels = (chartConfig.specialty && chartConfig.specialty.labels && chartConfig.specialty.labels.length) 
                    ? chartConfig.specialty.labels 
                    : ['Cardiology', 'Oncology', 'Orthopedics', 'Neurosurgery', 'Bariatric & Spine'];

                const donutOptions = {
                    series: specialtySeries,
                    labels: specialtyLabels,
                    chart: {
                        type: 'donut',
                        height: 310,
                        fontFamily: 'inherit'
                    },
                    colors: ['#27797D', '#1D4B6C', '#EF7415', '#06b6d4', '#8b5cf6', '#10b981', '#f59e0b'],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%',
                                labels: {
                                    show: true,
                                    name: {
                                        fontSize: '13px',
                                        fontWeight: 600,
                                        color: '#64748b'
                                    },
                                    value: {
                                        fontSize: '22px',
                                        fontWeight: 800,
                                        color: '#112347',
                                        formatter: function (val) {
                                            return val + " Cases";
                                        }
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total Cases',
                                        color: '#64748b',
                                        fontSize: '11px',
                                        fontWeight: 700,
                                        formatter: function (w) {
                                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                        }
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: { enabled: false },
                    legend: {
                        position: 'bottom',
                        fontSize: '11px',
                        fontWeight: 600,
                        markers: { radius: 12 }
                    },
                    stroke: { width: 0 },
                    tooltip: {
                        theme: 'dark'
                    }
                };

                const donutChart = new ApexCharts(donutChartEl, donutOptions);
                donutChart.render();
            }

            // ------------------------------------------
            // CHART 3: PYRAMID / FUNNEL CHART - Referral Pipeline
            // ------------------------------------------
            const funnelChartEl = document.querySelector("#chart-pipeline-pyramid");
            if (funnelChartEl) {
                const pipelineSeries = (chartConfig.pipeline && chartConfig.pipeline.series && chartConfig.pipeline.series.length) 
                    ? chartConfig.pipeline.series 
                    : [148, 126, 108, 89, 68, 62];
                const pipelineCategories = (chartConfig.pipeline && chartConfig.pipeline.categories && chartConfig.pipeline.categories.length) 
                    ? chartConfig.pipeline.categories 
                    : [
                        '1. Inquiries Received',
                        '2. Reports Reviewed',
                        '3. Quotes & Plans Shared',
                        '4. Medical Visa Issued',
                        '5. Hospital Admitted',
                        '6. Successful Discharge'
                    ];

                const funnelOptions = {
                    series: [
                        {
                            name: "Patients",
                            data: pipelineSeries
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 310,
                        toolbar: { show: false },
                        fontFamily: 'inherit'
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: true,
                            isFunnel: true,
                            distributed: true
                        }
                    },
                    colors: [
                        '#1D4B6C',
                        '#27797D',
                        '#0ea5e9',
                        '#10b981',
                        '#EF7415',
                        '#f59e0b'
                    ],
                    dataLabels: {
                        enabled: true,
                        formatter: function (val, opt) {
                            return (opt.w.globals.labels[opt.dataPointIndex] || '') + ": " + val;
                        },
                        dropShadow: { enabled: false },
                        style: {
                            fontSize: '11px',
                            fontWeight: 700
                        }
                    },
                    xaxis: {
                        categories: pipelineCategories
                    },
                    legend: { show: false },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function (val) {
                                return val + " Patients";
                            }
                        }
                    }
                };

                const funnelChart = new ApexCharts(funnelChartEl, funnelOptions);
                funnelChart.render();
            }

            // ------------------------------------------
            // CHART 4: RADIAL BAR / TARGET ACHIEVEMENT
            // ------------------------------------------
            const radialChartEl = document.querySelector("#chart-target-radial");
            if (radialChartEl) {
                const radialSeries = (chartConfig.radialProgress !== undefined) ? [chartConfig.radialProgress] : [86];

                const radialOptions = {
                    series: radialSeries,
                    chart: {
                        height: 310,
                        type: 'radialBar',
                        fontFamily: 'inherit'
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            hollow: {
                                size: '70%'
                            },
                            track: {
                                background: '#f1f5f9',
                                strokeWidth: '100%'
                            },
                            dataLabels: {
                                name: {
                                    fontSize: '12px',
                                    color: '#64748b',
                                    fontWeight: 700,
                                    offsetY: -10
                                },
                                value: {
                                    offsetY: 5,
                                    fontSize: '28px',
                                    fontWeight: 900,
                                    color: '#112347',
                                    formatter: function (val) {
                                        return val + "%";
                                    }
                                }
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: 'horizontal',
                            shadeIntensity: 0.5,
                            gradientToColors: ['#EF7415'],
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100]
                        }
                    },
                    colors: ['#27797D'],
                    stroke: {
                        dashArray: 4
                    },
                    labels: ['Monthly Target']
                };

                const radialChart = new ApexCharts(radialChartEl, radialOptions);
                radialChart.render();
            }
        }

        }

    });
</script>
