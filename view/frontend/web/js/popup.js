define(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'mage/url',
        'Ivey_Callmeback/PhoneFormatter'
    ],
    function(
        $,
        modal,
        url
    ) {
        var popup = function (config, node) {
            $(node).find('input').mask('(999) 999 999');

            var options = {
                type: 'popup',
                responsive: false,
                innerScroll: true,
                title: 'Call me back! Request form.',
                buttons: [{
                    text: $.mage.__('Continue'),
                    class: '',
                    click: function () {

                        $.ajax({
                            url: url.build('callme/request/push'),
                            type: 'post',
                            data: {
                                phone: $(node).find('input').val()
                            }
                        });

                        this.closeModal();
                    }
                }]
            };

            modal(options, $(node));
            $(node).modal("openModal");
        };

        return popup;
    }
);