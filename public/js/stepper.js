document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 1;
    const totalSteps = 5;

    function updateSteps() {
        document.querySelectorAll(".step-content").forEach((step) => {
            step.classList.toggle("hidden", step.dataset.step != currentStep);
        });

        document.querySelectorAll("#stepper ol li").forEach((li, index) => {
            const stepNum = index + 1;
            const circle = li.querySelector("div");
            const line = li.querySelector("div:last-child");

            if (stepNum < currentStep) {
                circle.classList.add("bg-primary", "text-white");
                circle.classList.remove("bg-gray-300", "text-gray-600");
                line.classList.remove("bg-gray-300");
                if (line) line.classList.add("bg-primary");
            } else if (stepNum === currentStep) {
                circle.classList.add("bg-primary", "text-white");
                circle.classList.remove("bg-gray-300", "text-gray-600");
            } else {
                circle.classList.add("bg-gray-300", "text-gray-600");
                circle.classList.remove(
                    "bg-primary",
                    "text-white",
                    "bg-primary"
                );
                if (line) line.classList.add("bg-gray-300");
                if (line) line.classList.remove("bg-blue-500");
            }
        });

        document
            .getElementById("prevStep")
            .classList.toggle("hidden", currentStep === 1);
        document
            .getElementById("nextStep")
            .classList.toggle("hidden", currentStep === totalSteps);
        document
            .getElementById("finishStep")
            .classList.toggle("hidden", currentStep !== totalSteps);
    }

    document.getElementById("nextStep").addEventListener("click", function () {
        if (currentStep < totalSteps) {
            currentStep++;
            updateSteps();
        }
    });

    document.getElementById("prevStep").addEventListener("click", function () {
        if (currentStep > 1) {
            currentStep--;
            updateSteps();
        }
    });

    updateSteps();
});
