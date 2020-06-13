Alert = {

    Welcome: function() {

        let positions = ['topLeft', 'topRight', 'bottomLeft', 'bottomRight'];

        for(i = 0; i < positions.length; i++) {

        let box = document.createElement('div');
        box.classList.add('alert-'+positions[i]);
        document.body.append(box);

        }

    },

    setAlert: function(position, type, text, milliseconds) {

        let positions = ['topLeft', 'topRight', 'bottomLeft', 'bottomRight'];
        let types = ['success', 'danger', 'primary', 'warning'];

        if(positions.indexOf(position) > -1) {

            if(types.indexOf(type) > -1) {

                let txtCapt;
                switch(type) {
                    case 'success':
                        txtCapt = 'OK';
                        break;
                    case 'danger':
                        txtCapt = 'Error';
                        break;
                    case 'primary':
                        txtCapt = 'Info';
                        break;
                    case 'warning':
                        txtCapt = 'Caution';
                        break;
                }

                id = $('.alert-'+position).children().length + 1;
                let alert = document.createElement('div');
                alert.classList.add('alert-'+type);
                alert.id = id;
                let icon = document.createElement('i');
                icon.classList.add('icon-'+type);
                alert.append(icon);
                let caption = document.createElement('p');
                caption.classList.add('caption');
                caption.textContent = txtCapt;
                alert.append(caption)
                let txt = document.createElement('div');
                txt.classList.add('text-alert');
                txt.textContent = text;
                alert.append(txt);
                $('.alert-'+position).append(alert)
                setTimeout(function() {
                    document.querySelector('.alert-'+position).removeChild(alert)
                }, milliseconds + 500);

            } else {

                console.log("Tipo de alerta não encontrado.");

            }

        } else {

            console.log("Posição não encontrada.");

        }

    }

}

Alert.Welcome();