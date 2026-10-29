<script>
    function initializePartnerScript() {

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
        // 4. APEXCHARTS INITIALIZATION WITH RETRY
        // ==========================================
        function initApexCharts(retries = 20) {
            if (typeof ApexCharts === 'undefined') {
                if (retries > 0) {
                    setTimeout(() => initApexCharts(retries - 1), 100);
                }
                return;
            }

            const chartConfig = window.dashboardChartData || {};

            // ------------------------------------------
            // CHART 1: BAR CHART - Referrals & Admissions Trend
            // ------------------------------------------
            const barChartEl = document.querySelector("#chart-referrals-bar");
            if (barChartEl && !barChartEl.hasAttribute('data-chart-rendered')) {
                barChartEl.setAttribute('data-chart-rendered', 'true');
                barChartEl.innerHTML = '';

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
                            borderRadius: 4
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
                                return (val || 0) + " Patients";
                            }
                        }
                    }
                };

                try {
                    const barChart = new ApexCharts(barChartEl, barOptions);
                    barChart.render();
                } catch (e) {
                    console.error('Failed to render barChart:', e);
                }
            }

            // ------------------------------------------
            // CHART 2: DONUT / PIE CHART - Specialty Distribution
            // ------------------------------------------
            const donutChartEl = document.querySelector("#chart-specialty-donut");
            if (donutChartEl && !donutChartEl.hasAttribute('data-chart-rendered')) {
                donutChartEl.setAttribute('data-chart-rendered', 'true');
                donutChartEl.innerHTML = '';

                let specialtySeries = (chartConfig.specialty && chartConfig.specialty.series && chartConfig.specialty.series.length) 
                    ? chartConfig.specialty.series 
                    : [44, 36, 28, 22, 18];
                let specialtyLabels = (chartConfig.specialty && chartConfig.specialty.labels && chartConfig.specialty.labels.length) 
                    ? chartConfig.specialty.labels 
                    : ['Cardiology', 'Oncology', 'Orthopedics', 'Neurosurgery', 'Bariatric & Spine'];

                specialtySeries = specialtySeries.map(val => Number(val) || 0);

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
                                            return (val || 0) + " Cases";
                                        }
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total Cases',
                                        color: '#64748b',
                                        fontSize: '11px',
                                        fontWeight: 700,
                                        formatter: function (w) {
                                            if (!w || !w.globals || !w.globals.seriesTotals) return "0 Cases";
                                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0) + " Cases";
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

                try {
                    const donutChart = new ApexCharts(donutChartEl, donutOptions);
                    donutChart.render();
                } catch (e) {
                    console.error('Failed to render donutChart:', e);
                }
            }

            // ------------------------------------------
            // CHART 3: PYRAMID / FUNNEL CHART - Referral Pipeline
            // ------------------------------------------
            const funnelChartEl = document.querySelector("#chart-pipeline-pyramid");
            if (funnelChartEl && !funnelChartEl.hasAttribute('data-chart-rendered')) {
                funnelChartEl.setAttribute('data-chart-rendered', 'true');
                funnelChartEl.innerHTML = '';

                let pipelineSeries = (chartConfig.pipeline && chartConfig.pipeline.series && chartConfig.pipeline.series.length) 
                    ? chartConfig.pipeline.series 
                    : [148, 126, 108, 89, 68, 62];
                let pipelineCategories = (chartConfig.pipeline && chartConfig.pipeline.categories && chartConfig.pipeline.categories.length) 
                    ? chartConfig.pipeline.categories 
                    : [
                        '1. Inquiries Received',
                        '2. Reports Reviewed',
                        '3. Quotes & Plans Shared',
                        '4. Medical Visa Issued',
                        '5. Hospital Admitted',
                        '6. Successful Discharge'
                    ];

                pipelineSeries = pipelineSeries.map(val => Number(val) || 0);

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
                            distributed: true,
                            barHeight: '65%'
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
                        textAnchor: 'start',
                        style: {
                            colors: ['#fff'],
                            fontSize: '11px',
                            fontWeight: 700
                        },
                        formatter: function (val, opt) {
                            const cats = opt && opt.w && opt.w.config && opt.w.config.xaxis ? opt.w.config.xaxis.categories : null;
                            const catName = cats ? (cats[opt.dataPointIndex] || '') : '';
                            return catName ? (catName + ": " + (val || 0)) : (val || 0);
                        },
                        offsetX: 5,
                        dropShadow: { enabled: false }
                    },
                    xaxis: {
                        categories: pipelineCategories,
                        labels: {
                            style: { colors: '#64748b', fontSize: '11px', fontWeight: 600 }
                        }
                    },
                    yaxis: {
                        labels: {
                            show: false
                        }
                    },
                    legend: { show: false },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function (val) {
                                return (val || 0) + " Patients";
                            }
                        }
                    }
                };

                try {
                    const funnelChart = new ApexCharts(funnelChartEl, funnelOptions);
                    funnelChart.render();
                } catch (e) {
                    console.error('Failed to render funnelChart:', e);
                }
            }

            // ------------------------------------------
            // CHART 4: RADIAL BAR / TARGET ACHIEVEMENT
            // ------------------------------------------
            const radialChartEl = document.querySelector("#chart-target-radial");
            if (radialChartEl && !radialChartEl.hasAttribute('data-chart-rendered')) {
                radialChartEl.setAttribute('data-chart-rendered', 'true');
                radialChartEl.innerHTML = '';

                const radialSeries = (chartConfig.radialProgress !== undefined) ? [Number(chartConfig.radialProgress) || 0] : [86];

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
                                        return (val || 0) + "%";
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

                try {
                    const radialChart = new ApexCharts(radialChartEl, radialOptions);
                    radialChart.render();
                } catch (e) {
                    console.error('Failed to render radialChart:', e);
                }
            }
        }

        initApexCharts();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializePartnerScript);
    } else {
        initializePartnerScript();
    }
</script>
