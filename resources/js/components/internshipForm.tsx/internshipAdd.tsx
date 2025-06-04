import { useForm } from "@inertiajs/react";
import { router } from "@inertiajs/react";
import React from 'react';

export default function AddStudentButton({  }) {
    const { data, setData, reset, errors, processing } = 
       useForm({
        student_id: '',
        internship_id: '',
        teacher_id: '',
        status: '',
       })
        const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        router.post("/internshipform", data, {
            onSuccess: () => {},
        });
        };
        return (
        <>
            
        </>
    );
};