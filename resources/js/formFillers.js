import { faker } from "@faker-js/faker";

export function fillRegisterForm() {
    document.querySelector('[name="name"]').value = faker.person.fullName();
    document.querySelector('[name="email"]').value = faker.internet.email();
    document.querySelector('[name="password"]').value = "password";
    document.querySelector('[name="password_confirmation"]').value = "password";
};

export function fillLoginForm() {
    document.querySelector('[name="email"]').value = "souhail@email.com";
    document.querySelector('[name="password"]').value = "password";
};