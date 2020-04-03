@extends('layouts.admin.app')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    <span class="icon">
                     <i class="fa fa-plus"></i>
                    </span>
                    Add New Virtualizor Server
                </h1>
                <h2 class="subtitle">
                    Add new Dedicated Server
                </h2>
            </div>
        </div>
    </section>
    <div class="container">
        <form method="POST" action="{{route('admin.server.store')}}" id="create_server_form">
            @csrf
            @include('layouts.admin.formErrors')
            <div class="columns is-multiline">
                <div class="column is-6 is-12-mobile">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Server Name</label>
                                <div class="control">
                                    <input class="input" name="name" type="text" placeholder="what do you call it?">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Server URL</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="domain" type="text" placeholder="https://yourServerURL.com">
                                    <span class="icon is-small is-left">
      <i class="fas fa-link"></i>
    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-12-mobile">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">DataCenter</label>
                                <p class="control has-icons-left">
                                    <span class="select">
                                      <select class="" name="datacenter" required>
                                        <option selected value="">choose a DataCenter</option>
                                        <option>Hetzner</option>
                                        <option>OVH</option>
                                      </select>
                                    </span>
                                                                    <span class="icon is-small is-left">
                                      <i class="fas fa-server"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Server Location</label>
                                <p class="control has-icons-left">
                                    <span class="select">
                                      <select name="location">
                                        <option selected>choose server location</option>
                                        <option>Select dropdown</option>
                                        <option>With options</option>
                                      </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-globe"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-12-mobile">
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Server IP</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="ip" type="text" placeholder="192.168.1.1">
                                    <span class="icon is-small is-left">
      <i class="fas fa-ethernet"></i>
    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">PORT</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="port" type="number" value="4085" placeholder="4085">
                                    <span class="icon is-small is-left">
      <i class="fas fa-project-diagram"></i>
    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-12-mobile">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Payment Day</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="payment" type="number" placeholder="10th day everyMonth">
                                    <span class="icon is-small is-left">
      <i class="fas fa-calendar"></i>
    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Server Price</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="price" type="number" value="10" placeholder="10">
                                    <span class="icon is-small is-left">
      <i class="fas fa-euro-sign"></i>
    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-12-mobile">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">API Key</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="key" type="text" placeholder="Server API Key">
                                    <span class="icon is-small is-left">
      <i class="fas fa-key"></i>
    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">API Key Pass</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="pass" type="password" placeholder="KeyPass">
                                    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-12-mobile">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">License Key</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="licence_key" type="text" placeholder="00000-00000-00000-00000-00000 ">
                                    <span class="icon is-small is-left">
      <i class="fas fa-user-lock"></i>
    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Primary Plan ID</label>
                                <p class="control has-icons-left">
                                    <span class="select">
                                      <select class="" name="plans_id" required>
                                        <option selected value="">Choose a plan</option>
                                        <option>Hetzner</option>
                                        <option>OVH</option>
                                      </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-paper"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Admin ID</label>
                                <p class="control has-icons-left">
                                    <span class="select">
                                      <select class="" name="datacenter" required>
                                        <option selected value="">choose a DataCenter</option>
                                        <option>Hetzner</option>
                                        <option>OVH</option>
                                      </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-server"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
