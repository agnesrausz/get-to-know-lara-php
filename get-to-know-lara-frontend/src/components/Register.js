import React, {createRef} from 'react';
import {useForm} from 'react-hook-form';
import axios from "axios";

function Register() {
    const {register, handleSubmit} = useForm();


    const onSubmit = async (data) => {
        console.log(data)

        let response = await axios.post('http://localhost:8000/api/register', data);
        console.log(response)
    }

    return (
        <div>
            <form onSubmit={handleSubmit(onSubmit)}>
                <input  {...register("name")} type="text" name='name' />
                <input  {...register("email")} type="text" name='email' />
                <input  {...register("password")} type="text" name="password"/>
                <input  {...register("password_confirmation")} type="text" name="password_confirmation"/>
                <input type="submit"/>
            </form>
        </div>
    );
}

export default Register;