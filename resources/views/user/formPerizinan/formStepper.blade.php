@extends('layouts.stepperForm')

@section('title', 'Form Perizinan')

@section('content-primary')

@section('step-1')
    @include('user.formPerizinan.formStepper.stepRequestPermit')
@endsection

@section('step-2')
    {{-- @dd($locations); --}}
    {{-- @include('user.formPerizinan.formStepper.stepGisPermit') --}}
    @include('user.formPerizinan.formStepper.stepGisPermit')
@endsection

@section('step-3')
    @include('user.formPerizinan.formStepper.stepTypeRequestPermit')
@endsection

@section('step-4')
    @include('user.formPerizinan.formStepper.stepDokumenPermit')
@endsection

@section('step-5')
    @include('user.formPerizinan.formStepper.stepProyekPermit')
@endsection
