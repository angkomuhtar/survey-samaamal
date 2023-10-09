// function initializeWizardForm(form) {
//     // Get references
// }

$(() => {
    var form = $(".wizard");
    const steps = form.find(".wizard-step");
    const formSteps = form.find(".wizard-form-step");
    const nextBtn = form.find(".next-button");
    const prevBtn = form.find(".prev-button");

    let currentStep = 0;
    nextBtn?.on("click", () => {
        $.ajax({
            type: "post",
            url: '{!! route('ajax.uservalidate') !!}',
            data: { CSRF: getCSRFTokenValue() },
        });
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateStep("next");
        }
    });

    prevBtn?.on("click", () => {
        if (currentStep > 0) {
            currentStep--;
            updateStep("prev");
        }
    });

    function updateStep(type) {
        $(formSteps).removeClass("active");
        $($(formSteps)[currentStep]).addClass("active");
        if (type == "next") {
            $($(steps)[currentStep - 1])
                .removeClass("active")
                .addClass("passed");
            $($(steps)[currentStep]).addClass("active");
            if (currentStep > 0) {
                $(prevBtn).show();
            }
            if (currentStep == steps.length - 1) {
                $(nextBtn).html("Simpan");
            }
        } else if (type == "prev") {
            $($(steps)[currentStep + 1]).removeClass("active");
            $($(steps)[currentStep]).addClass("active").removeClass("passed");
            if (currentStep == 0) {
                $(prevBtn).hide();
            }
            if (currentStep < steps.length - 1) {
                $(nextBtn).html("Selanjutnya");
            }
        }
    }
});
