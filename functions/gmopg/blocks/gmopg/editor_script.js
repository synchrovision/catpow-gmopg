registerBlockType('catpow/gmopg', {
  title: '🐾 Gmopg',
  icon: 'cart',
  category: 'catpow',
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes,
        isSelected = _ref.isSelected;
    var _wp$element = wp.element,
        Fragment = _wp$element.Fragment,
        useMemo = _wp$element.useMemo;
    var items = attributes.items,
        classes = attributes.classes;
    var primaryClass = 'wp-block-catpow-gmopg';
    var sendSomeMail = attributes.GuideMailSendFlag || attributes.ThanksMailSendFlag;
    var selectiveClasses = [{
      input: 'text',
      label: '注文ID',
      key: 'OrderID'
    }, {
      input: 'text',
      label: '価格',
      key: 'Amount'
    }, {
      input: 'text',
      label: '取引詳細',
      key: 'Detail'
    }, {
      input: 'bool',
      label: '決済URL案内メール送信',
      key: 'GuideMailSendFlag'
    }, {
      input: 'bool',
      label: '購入ありがとうメール送信',
      key: 'ThanksMailSendFlag'
    }, {
      input: 'text',
      label: 'メール送信先アドレス',
      key: 'SendMailAddress',
      cond: sendSomeMail
    }, {
      input: 'text',
      label: '顧客名',
      key: 'CustomerName',
      cond: sendSomeMail
    }, {
      input: 'text',
      label: 'メール送信元',
      key: 'FromSendMailAddress',
      cond: sendSomeMail
    }, {
      input: 'text',
      label: 'メール送信元名',
      key: 'FromSendMailName',
      cond: sendSomeMail
    }, {
      input: 'text',
      label: 'BCC送信先',
      key: 'BccSendMailAddress',
      cond: sendSomeMail
    }, {
      input: 'text',
      label: 'テンプレートNo',
      key: 'TemplateNo',
      cond: sendSomeMail
    }];
    return wp.element.createElement(Fragment, null, wp.element.createElement(InspectorControls, null, wp.element.createElement(CP.SelectClassPanel, {
      title: __('クラス', 'catpow'),
      icon: "art",
      set: setAttributes,
      attr: attributes,
      selectiveClasses: selectiveClasses,
      filters: CP.filters.section || {}
    })), wp.element.createElement("div", {
      className: "wp-block-catpow-gmopg"
    }, wp.element.createElement("a", {
      className: "wp-block-catpow-gmopg__button"
    }, wp.element.createElement(RichText, {
      onChange: function onChange(text) {
        setAttributes({
          text: text
        });
      },
      value: attributes.text
    }))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes,
        className = _ref2.className;
    return wp.element.createElement("div", {
      className: "wp-block-catpow-gmopg"
    }, wp.element.createElement("a", {
      className: "wp-block-catpow-gmopg__button",
      href: "[gmopg_checkout_url]"
    }, wp.element.createElement(RichText.Content, {
      value: attributes.text
    })));
  }
});
