<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.form', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

            'phone' => 'required',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }


    public function importForm()
    {
        return view('contacts.import');
    }

    public function importXml(Request $request)
    {
        $request->validate(['xml_file' => 'required|file|mimes:xml']);
        
        $xml = simplexml_load_file($request->file('xml_file'));
        
        foreach ($xml->contact as $contact) {
            Contact::create([
                'name' => (string)$contact->name,
                'phone' => (string)$contact->phone
            ]);
        }

        return redirect()->route('contacts.index');
    }
}
