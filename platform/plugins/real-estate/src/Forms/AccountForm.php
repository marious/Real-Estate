<?php

namespace Botble\RealEstate\Forms;

use Assets;
use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Http\Requests\AccountCreateRequest;
use Botble\RealEstate\Models\Account;
use Throwable;

class AccountForm extends FormAbstract
{

    /**
     * @var string
     */
    protected $template = 'plugins/real-estate::account.admin.form';

    /**
     * @return mixed|void
     * @throws Throwable
     */
    public function buildForm()
    {
        Assets::addStylesDirectly('vendor/core/plugins/real-estate/css/account-admin.css')
            ->addScriptsDirectly(['/vendor/core/plugins/real-estate/js/account-admin.js']);

        $this
            ->setupModel(new Account)
            ->setValidatorClass(AccountCreateRequest::class)
            ->withCustomFields()
            ->add('first_name', 'text', [
                'label'      => __('First Name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('last_name', 'text', [
                'label'      => __('Last Name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('username', 'text', [
                'label'      => __('Username'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => __('Ex: john_smith'),
                    'data-counter' => 120,
                ],
            ])
            ->add('phone', 'text', [
                'label'      => __('Phone'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => __('Phone'),
                    'data-counter' => 20,
                ],
            ])
            ->add('email', 'text', [
                'label'      => trans('plugins/real-estate::account.form.email'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => __('Ex: example@gmail.com'),
                    'data-counter' => 60,
                ],
            ])
            ->add('is_change_password', 'checkbox', [
                'label'      => trans('plugins/real-estate::account.form.change_password'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'hrv-checkbox',
                ],
                'value'      => 1,
            ])
            ->add('password', 'password', [
                'label'      => trans('plugins/real-estate::account.form.password'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ])
            ->add('password_confirmation', 'password', [
                'label'      => trans('plugins/real-estate::account.form.password_confirmation'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ]);

        if ($this->getModel()->id) {
            $this->addMetaBoxes([
                'credits' => [
                    'title'   => null,
                    'content' => view('plugins/real-estate::account.admin.credits', ['account' => $this->model, 'transactions' => $this->model->transactions()->orderBy('created_at', 'DESC')->get()])->render(),
                    'wrap'    => false,
                ],
            ]);
        }
    }
}
