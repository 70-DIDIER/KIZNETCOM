@extends('layouts.app')

@section('content')
  @include('pages.sections.hero')
  @include('pages.sections.stats')
  @include('pages.sections.about')
  @include('pages.sections.services')
  @include('pages.sections.testimonials')
  @include('pages.sections.cta')
  @include('pages.sections.realisations')
  @include('pages.sections.contact')
@endsection
