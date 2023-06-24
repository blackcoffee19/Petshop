<script>
    $(document).ready(function(){

        @if(isset($income) && isset($expense) && isset($arr_order))
        const theme={primary:"var(--fc-primary)",secondary:"var(--fc-secondary)",success:"var(--fc-success)",info:"var(--fc-info)",warning:"var(--fc-warning)",danger:"var(--fc-danger)",dark:"var(--fc-dark)",light:"var(--fc-light)",white:"var(--fc-white)",gray100:"var(--fc-gray-100)",gray200:"var(--fc-gray-200)",gray300:"var(--fc-gray-300)",gray400:"var(--fc-gray-400)",gray500:"var(--fc-gray-500)",gray600:"var(--fc-gray-600)",gray700:"var(--fc-gray-700)",gray800:"var(--fc-gray-800)",gray900:"var(--fc-gray-900)",black:"var(--fc-black)",transparent:"transparent"};
        let arr_income = [];
        let arr_expense = [];
        let arr_order =[];
        let top_product= {route:[],name_product:[],name:'purchase',data:[],'image':[]};
        @foreach($income as $key=> $ic)
            arr_income.push(({{$ic}}).toFixed(2));
        @endforeach
        @foreach($expense as $key=> $ex)
            arr_expense.push(({{$ex}}).toFixed(2));
        @endforeach
        @foreach($arr_order as $key=>$or){
            arr_order.push({{$or}})
        }
        @endforeach
        @foreach ($hot_product as $key=>$hp)
        var name = '{{$hp->name_product}}';
        var data = {{$hp->number}};
        top_product['data'].push(data);
        top_product['name_product'].push(name);
        top_product['route'].push('{{$hp->route}}');
        top_product['image'].push('{{$hp->image}}');
        @endforeach
    window.theme=theme,function(){
        var e;
        $("#revenueChart").length&&(
            e={series:[
                {name:"Total Income",data:arr_income},
                {name:"Total Expense",data:arr_expense}],
                labels:["Jan","Feb","March","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                chart:{
                    height:350,
                    type:"area",
                    toolbar:{show:!1}
                },
                dataLabels:{enabled:!1},
                markers:{size:5,hover:{size:6,sizeOffset:3}},
                colors:["#0aad0a","#ffc107"],
                stroke:{curve:"smooth",width:2},
                grid:{borderColor:window.theme.gray300},
                xaxis:{
                    labels:{
                        show:!0,
                        align:"right",
                        minWidth:0,
                        maxWidth:160,
                        style:{
                            fontSize:"12px",
                            fontWeight:400,
                            colors:[window.theme.gray600],
                            fontFamily:'"Inter", "sans-serif"'
                        }
                    },
                    axisBorder:{show:!0,color:window.theme.gray300,height:1,width:"100%",offsetX:0,offsetY:0},
                    axisTicks:{show:!0,borderType:"solid",color:window.theme.gray300,height:6,offsetX:0,offsetY:0}
                },
                legend:{
                    position:"top",
                    fontWeight:600,
                    color:window.theme.gray600,
                    markers:{width:8,height:8,strokeWidth:0,strokeColor:"#fff",fillColors:void 0,radius:12,customHTML:void 0,onClick:void 0,offsetX:0,offsetY:0},
                    labels:{colors:window.theme.gray600,useSeriesColors:!1}
                },
                yaxis:{
                    labels:{
                        formatter:function(e){return "$"+e},
                        show:!0,
                        align:"right",
                        minWidth:0,
                        maxWidth:160,
                        style:{
                            fontSize:"12px",
                            fontWeight:400,
                            colors:window.theme.gray600,
                            fontFamily:'"Inter", "sans-serif"'}
                    }
                }
            },
            new ApexCharts(document.querySelector("#revenueChart"),e).render()
        ),
        $("#totalSale").length&&(
            e={
                series:arr_order,
                labels:["Finished","Cancel","Transaction Failed","Other"],
                colors:["#0aad0a","#ffc107","#db3030","#016bf8"],
                chart:{type:"donut",height:280},legend:{show:!1},
                dataLabels:{enabled:!1},
                plotOptions:{
                    pie:{
                        donut:{
                            size:"85%",
                            background:"transparent",
                            labels:{show:!0,
                                name:{show:!0,fontSize:"22px",fontFamily:'"Inter", "sans-serif"',fontWeight:600,colors:[window.theme.gray600],offsetY:-10,
                                    formatter:function(e){return e}
                                },
                                value:{show:!0,fontSize:"24px",fontFamily:'"Inter", "sans-serif"',fontWeight:800,colors:window.theme.gray800,offsetY:8,
                                    formatter:function(e){return e}
                                },
                                total:{show:!0,showAlways:!1,label:"Total Orders",fontSize:"16px",fontFamily:'"Inter", "sans-serif"',fontWeight:400,colors:window.theme.gray400,
                                    formatter:function(e){return e.globals.seriesTotals.reduce((e,r)=>e+r,0)}
                                }
                            }
                        }
                    }
                },
                stroke:{width:0},
                responsive:[{
                    breakpoint:1400,
                    options:{chart:{type:"donut",width:290,height:330}}
                }]
            },
            new ApexCharts(document.querySelector("#totalSale"),e).render()
        ),
        $("#top_product").length&&(
            e={
                series:[top_product],
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click: function(chart, w, config) {
                            var ix = config.dataPointIndex;
                            window.location.assign(top_product['route'][ix]);
                        }
                    },
                    toolbar: {
                        show:false
                    }
                },
                colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
                plotOptions: {
                    bar: {
                        columnWidth: '55%',
                        distributed: true,
                        dataLabels: {
                            position: 'top',
                        }
                    },
                    formatter: {
                        enabled: true,
                        style: {
                            colors: ['#333']
                        },
                        offsetX: 0,
                    },
                    
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: top_product['name_product'],
                    labels: {
                        style: {
                        colors: '#8B75D7',
                        fontSize: '13px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Time Order'
                    }
                }
            },
            new ApexCharts(document.querySelector("#top_product"),e).render()
            
        )
    }();
    @endif
    })

</script>