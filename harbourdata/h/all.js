$(document).ready(function () {
    $('#container').jqxKnob({
        value: 50,
        min: 50,
        max: 1024,
        startAngle: 120,
        endAngle: 420,
        snapToStep: true,
        rotation: 'clockwise',
        style: {  fill: { color: '#071c2e', gradientType: "linear", gradientStops: [[0, 1], [50, 0.9], [900, 1]] } },
        marks: {
          colorRemaining: { color: '#0f5fa3', border: '#0f5fa3' , background:'#0f5fa3' },
           colorProgress: { color: '#0f5fa3', border: '#071c2e' ,background:'#0f5fa3'},
           background: {  },
           type: 'line',
           offset: '44%',
           thickness: 1,

           size: '3%',
           majorSize: '5%',
           majorInterval: 20,
           minorInterval: 10
        },
        labels: {

            offset: '88%',
            step: 100,
            visible: true
        },
        progressBar: {
            style: { fill: '#00a4e1', },
            size: '9%',
            offset: '60%',
            background: { fill: '#fff', stroke: 'grey' },

        },

        dial:
            {
                style: { fill: { color: '#39b54a',  gradientStops: [[0, 0.9], [50, 1], [100, 0]] }, stroke: '#dfe3e9', strokeWidth: 15, },
                innerRadius: '0%', // specifies the inner Radius of the dial
                outerRadius: '45%',
                startAngle: 120,
                endAngle: 480,
            },
            spinner: {
              style: { fill: '#222',  },
              innerRadius: '65%', // specifies the inner Radius of the dial
              outerRadius: '70%' // specifies the outer Radius of the dial
              , marks: {
                  colorRemaining: "#00a4e1",
                  colorProgress: "#fff",
                  offset: '65%',
                  thickness: 0,
                  type: 'circle',
                  size: '4.8%',

                  majorInterval: 1024,

              }
            },
pointer: { type: 'arrow', style: { fill: '#980f13', stroke: '#980f13' }, size: '55%', offset: '0%', thickness: 10 }


    });
    var input = $('<div class="inputField">');
    $('#container').append(input);
    var inputOptions = {
        width: 180,
        height: '40px',
        decimal: 50, // starting value same as widget
        min: 50,  // same as widget
        max: 900, // same as widget
        textAlign: 'center',
        decimalDigits:0,
        inputMode: 'simple'
    };
    $(input).jqxNumberInput(inputOptions);
    $(input).on('mousedown', function(event){
        event.stopPropagation();
    });
    $(input).on('keyup', function () {
        var val = $(this).val();
        $('#container').val(val);
    });
    $(input).on('change', function () {
        var val = $(this).val();
        $('#container').val(val);
    });
    $('#container').on('change', function (event) {
        if (event.args.changeSource == 'propertyChange' || event.args.changeSource == 'val') { return; }
        $(input).val(event.args.value);
    })














});
