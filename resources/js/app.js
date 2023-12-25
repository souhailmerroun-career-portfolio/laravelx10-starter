import "./bootstrap";
import "./setupSentry";
import { fillRegisterForm, fillLoginForm } from "./formFillers";

window.fillRegisterForm = fillRegisterForm;
window.fillLoginForm = fillLoginForm;