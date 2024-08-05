class ZenBusinessCalc {
    constructor(id) {
        this.blockId = id;
        this.oneTime = 0;
        this.annual = 0;
        this.state = 0;
        this.filing = false;
        this.startetPlan = false;
        this.startetPlanPro = false;
        this.addEvents();
    }

    addEvents() {
        let self = this;
        jQuery(this.blockId + ' select ').each(function (key, el) {
            el = jQuery(el);
            let s2 = el.select2({
                placeholder: el.data('placeholder'),
                minimumResultsForSearch: -1,
                allowClear: true,
                width: '100%'
            });
        });
        jQuery(this.blockId + ' #plan').on('change', function () {
            self.unselectFiling();
            self.paymentUpdate();
            self.UpdateVal()
        });
        jQuery(this.blockId + ' #la_carte').on('change', function () {
            self.la_carteUpdate();
            self.paymentUpdate();
            self.UpdateVal()
        });
        jQuery(this.blockId + ' #state').on('change', function () {
            self.stateUpdate();
            self.UpdateVal()
        });
    }

    paymentUpdate() {
        let annual = 0;
        let oneTime = 0;

        let plan = jQuery(this.blockId + ' #plan').val().split(',');
        if (plan != '') {
            annual += parseInt(plan[0]);
            this.startetPlan = plan[1];
        } else {
            this.startetPlan = false;
        }

        let la_carte = jQuery(this.blockId + ' #la_carte').val();
        if (la_carte != '') {
            jQuery.each(la_carte, function (key, val) {
                let item = val.split(',');
                if (item[1] == 1) {
                    oneTime += parseInt(item[0]);
                } else {
                    annual += parseInt(item[0]);
                }
            });
        }
        this.annual = annual;
        this.oneTime = oneTime;
    }

    unselectFiling() {
        let self = this;
        let plan = jQuery(self.blockId + ' #plan').val().split(',');
        if (plan[1] == 0) {
            let val = jQuery(self.blockId + ' #la_carte').val();
            let rush = jQuery(self.blockId + ' .rush').val();
            let expedited = jQuery(self.blockId + ' .expedited').val();
            val = jQuery.grep(val, function (value) {
                return ((value != expedited) && (value != rush));
            });
            jQuery(this.blockId + ' #la_carte').val(val).trigger("change");
            jQuery(self.blockId + ' .rush').attr('disabled', 'disabled');
            jQuery(self.blockId + ' .expedited').attr('disabled', 'disabled');
            this.startetPlanPro = true;
            //this.filing = true;
        }
        else {
            this.startetPlanPro = false;
            //this.filing = false;
            jQuery(this.blockId + ' #la_carte option').removeAttr('disabled');
        }


    }

    la_carteUpdate() {
        let self = this;
        let la_carte = jQuery(this.blockId + ' #la_carte').val();
        let filing = false;
        if (!this.startetPlanPro) {
            jQuery(this.blockId + ' #la_carte option').removeAttr('disabled');
        }

        jQuery.each(la_carte, function (key, val) {
            let item = val.split(',');
            if (item[2] && (item[2] == 'expedited')) {
                jQuery(self.blockId + ' .rush').attr('disabled', 'disabled');
                filing = true;
            } else if (item[2] && (item[2] == 'rush')) {
                jQuery(self.blockId + ' .expedited').attr('disabled', 'disabled');
                filing = true;
            }
        });
        this.filing = filing;
        this.stateUpdate();
    }

    stateUpdate() {
        let stateVal = jQuery(this.blockId + ' #state').val().split(',');
        if (stateVal != '') {
            let state = parseInt(stateVal[0]);
            if (this.filing) {
                state += parseInt(stateVal[1]);
            }
            this.state = state;
        } else {
            this.state = 0;
        }
    }

    UpdateVal() {
        if (this.startetPlan && (this.startetPlan != 0)) {
            jQuery(this.blockId + ' .note').slideDown();
        } else {
            jQuery(this.blockId + ' .note').slideUp();
        }
        jQuery(this.blockId + ' #state_fee').text('$' + this.state);
        jQuery(this.blockId + ' #annual').text('$' + this.annual);
        jQuery(this.blockId + ' #one_time').text('$' + this.oneTime);
        let total = parseInt(this.state) + parseInt(this.oneTime) + parseInt(this.annual);
        jQuery(this.blockId + ' #total').text('$' + total);
    }

}
